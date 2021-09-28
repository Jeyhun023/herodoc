<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Chat\MessageResource;

class NewChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'opponent_user' => $this->user_id_from == auth()->id() ? $this->user_to : $this->user_from,
            'current_user' => $this->user_id_from == auth()->id() ? $this->user_from : $this->user_to,
            'last_message' => $this->whenLoaded('last_message', new MessageResource($this->last_message), null),
            'last_activity' => $this->last_activity->format('d/m/Y'),
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
