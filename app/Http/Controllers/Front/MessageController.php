<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatUser;
use App\Models\User;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.pages.messages');
    }

    public function loadChats()
    {
        $chats = ChatUser::where('user_id', auth()->user()->id)
            ->with(['chat' => function($query){
                $query->with('last_message');
                $query->with('opponent_user.user');
            }])
            ->leftJoin('chats', 'chats.id', '=', 'chat_users.chat_id')
            ->orderBy('chats.last_activity', 'DESC')
            ->get();

        $html = view('front.shared.chat-card', compact('chats'))->render();   

        return response()->json($html, 200);
      
    }

    public function applyChat(User $user)
    {
        $you = auth()->user();
        if($user->id == $you->id){
            abort(404);
        }

        $user_chats = ChatUser::where('user_id', $user->id)->pluck('chat_id');
        
        $your_chats = ChatUser::where('user_id', $you->id)
            ->with('chat')
            ->whereIn('chat_id', $user_chats)
            ->first();
        if($your_chats == null || empty($your_chats)){
            $chat = Chat::create([
                'last_activity' => now(),
                'code' => Str::random(32)
            ]);
            $chat_users = ChatUser::insert([
                ['user_id' => $you->id, 'chat_id' => $chat->id],
                ['user_id' => $user->id, 'chat_id' => $chat->id]
            ]);

            return redirect()->route('message.show', ['chat' => $chat->code]);
        }
        return redirect()->route('message.show', ['chat' => $your_chats->chat->code]);
    }

    public function show($chat)
    {
        $chat = Chat::whereHas('chat_users', function($q){
            $q->where('user_id', auth()->user()->id);
        })
        ->with(['messages', 'opponent_user.user'])
        ->where('code', $chat)
        ->firstOrFail();

        $chat->messages = $chat->messages->reverse();
        
        return view('front.pages.message', compact('chat'));
    }

    public function lastMessages($chat,$last_message_id)
    {
        $user = auth()->user();
        $chat = Chat::whereHas('chat_users', function($q) use($user) {
                $q->where('user_id', $user->id);
            })
            ->with(['messages' => function($query) use($user, $last_message_id) {
                $query->where('user_id_to', $user->id);
                $query->where('id', '>', $last_message_id);
            }])
            ->where('code', $chat)
            ->firstOrFail();
        $chat->messages = $chat->messages->reverse();
       
        $data['html'] = view('front.shared.message-card', compact('chat'))->render(); 
        $data['last_message_id'] = $last_message_id;
         
        if($chat->messages->isNotEmpty()){
            $data['last_message_id'] = $chat->messages->last()->id;
        }  

        return response()->json($data, 200);
      
    }

    public function sendMessages($chat, Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $data['user'] = auth()->user();

        $chat = Chat::whereHas('chat_users', function($q) use($data){
                $q->where('user_id', $data['user']->id);
            })
            ->with('opponent_user')
            ->where('code', $chat)
            ->firstOrFail();

        $data['message'] = Message::create([
            'chat_id' => $chat->id,
            'user_id_from' => $data['user']->id,
            'user_id_to' => $chat->opponent_user->user_id,
            'content' => $request->content
        ]);
        $chat->update(['last_activity' => $data['message']->created_at]);
        
        return response()->json($data, 200);
    }

    public function loadMessages($chat, $first_message_id)
    {
        $user = auth()->user();
        $chat = Chat::whereHas('chat_users', function($q) use($user) {
                $q->where('user_id', $user->id);
            })
            ->with(['messages' => function($query) use($user, $first_message_id) {
                $query->where('id', '<', $first_message_id);
            }])
            ->where('code', $chat)
            ->firstOrFail();
        $chat->messages = $chat->messages->reverse();

        $data['html'] = view('front.shared.message-card', compact('chat'))->render(); 
        $data['first_message_id'] = $first_message_id;
         
        if($chat->messages->isNotEmpty()){
            $data['first_message_id'] = $chat->messages->first()->id;
        }  
        
        return response()->json($data, 200);
      
    }
}
