<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatUser;
use App\Models\ChatMessage;
use App\Http\Requests\Chat\ChatCheckRequest;
use App\Http\Requests\Chat\ChatMessageRequest;
use App\Http\Requests\Chat\ChatLoadRequest;
use App\Http\Resources\Chat\ChatCollection;
use App\Http\Resources\Chat\ChatResource;
use App\Http\Resources\Chat\MessageResource;
use App\Http\Resources\Chat\MessageCollection;
use App\Events\NewChatMessageEvent;
use App\Events\MessagesEditEvent;
use App\Models\User;

class ChatController extends Controller
{
    public $user;
    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    public function chats()
    {
        if($this->user->mail_status == 1){
            User::where('id', $this->user->id)->update([
                'mail_status' => 0
            ]);
        }
        $chats = ChatUser::has('last_message')
            ->where('user_id_from', $this->user->id)
            ->orWhere('user_id_to' , $this->user->id)
            ->with(['user_to','user_from','last_message'])
            ->orderBy('last_activity', 'DESC')
            ->get();
        $chats = (new ChatCollection($chats))->resolve();
        return view('front.pages.messages', compact('chats'));
    }

    public function check($user, ChatCheckRequest $request)
    {
        if($request->user == $this->user->id){
            abort(404);
        }

        $newChat = ChatUser::where(['user_id_from' => $this->user->id, 'user_id_to' => $request->user])
            ->orWhere(function ($query) use ($request) {
                $query->where(['user_id_from' => $request->user, 'user_id_to' => $this->user->id]);
            })
            ->with('messages.user', 'user_from', 'user_to')
            ->first();
        if(!$newChat){
            $newChat = new ChatUser();
            $newChat->user_id_from = $this->user->id;
            $newChat->user_id_to = $request->user;
            $newChat->last_activity = now();
            $newChat->save();
        }

        $newChat->messages = $newChat->messages->reverse();
        $chat = (new ChatResource($newChat))->resolve();
   
        return view('front.pages.message', compact('chat'));
    }

    public function loadMessage($chat, $limit, ChatLoadRequest $request)
    {
        $loadMessage = ChatMessage::where('chat_id', $chat)
            ->where('id', '<', $limit)
            ->with('user')
            ->latest('id')
            ->take(15)
            ->get();
        $loadMessage->isNotEmpty() ? $data['first_message_id'] = $loadMessage->last()->id : $data['first_message_id'] = $limit;
        $loadMessage = (new MessageCollection($loadMessage->reverse()))->resolve();
        $data['html'] = view('front.shared.message-card', compact('loadMessage'))->render();   
       
        return response()->json($data, 200);
    }

    public function sendMessage($chat, ChatMessageRequest $request)
    {
        $newMessage = new ChatMessage();
        $newMessage->chat_id = $chat;
        $newMessage->user_id = $this->user->id;
        $newMessage->content = $request->content;
        $newMessage->save();
        ChatUser::where('id', $chat)->update(['last_activity' => now()]);
        broadcast(new NewChatMessageEvent ($newMessage));
        broadcast(new MessagesEditEvent ($newMessage->chat));

        $newMessage = (new MessageResource($newMessage))->resolve();
      
        return response()->json($newMessage, 200);
    }
    
}
