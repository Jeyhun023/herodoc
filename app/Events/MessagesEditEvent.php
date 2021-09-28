<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\ChatUser;
use App\Http\Resources\Chat\NewChatResource;

class MessagesEditEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chatUser;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ChatUser $chatUser)
    {
        $this->chatUser = (new NewChatResource($chatUser))->resolve();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat-user-'.$this->chatUser['opponent_user']->id);
    }

    public function broadcastAs()
    {
        return 'messages-edit';
    }
}
