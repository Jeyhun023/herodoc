<?php

namespace App\Listeners;

use App\Events\NewChatMessageEvent;
use App\Notifications\Chat\NewMessageMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        if($event->chatMessage->chat->user_from->id == auth()->id()){
            if(!$event->chatMessage->chat->user_to->isOnline()){
                $event->chatMessage->chat->user_to->notify((new NewMessageMail($event->chatMessage->chat->user_to))->onQueue("default"));
            }
        }else{
            if(!$event->chatMessage->chat->user_from->isOnline()){
                $event->chatMessage->chat->user_from->notify((new NewMessageMail($event->chatMessage->chat->user_from))->onQueue("default"));
            }
        }
    }
}
