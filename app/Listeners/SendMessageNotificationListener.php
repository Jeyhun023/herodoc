<?php

namespace App\Listeners;

use App\Events\NewChatMessageEvent;
use App\Notifications\Chat\NewMessageMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class SendMessageNotificationListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
    */

    public function handle(NewChatMessageEvent $event)
    {
        $user_from = $event->chatMessage->chat->user_from;
        $user_to = $event->chatMessage->chat->user_to;

        if($user_from->id == auth()->id()){

            if(!$user_to->isOnline() && !$user_to->mail_status){
                User::where('id', $user_to->id)->update([
                    'mail_status' => 1
                ]);
                $user_to->notify( (new NewMessageMail() ) );
            }

        }else{

            if(!$user_from->isOnline() && !$user_from->mail_status){
                User::where('id', $user_from->id)->update([
                    'mail_status' => 1
                ]);
                $user_from->notify( (new NewMessageMail() ) );
            }

        }
    }
}
