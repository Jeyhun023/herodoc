<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Chat\MessageResource;

class ChatCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($message) {
            return [
                'id' => $message->id,
                'opponent_user' => $message->user_id_from == auth()->id() ? $message->user_to : $message->user_from,
                'last_message' => $message->whenLoaded('last_message', new MessageResource($message->last_message), null),
                'last_activity' => $message->last_activity->format('H:i'),
                'created_at' => $message->created_at->format('d/m/Y'),
                'updated_at' => $message->updated_at->format('d/m/Y')
            ];
        })->toArray();
        return parent::toArray($request);
    }
}
