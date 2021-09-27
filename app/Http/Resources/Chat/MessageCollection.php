<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MessageCollection extends ResourceCollection
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
                'user' => $message->user,
                'content' => $message->content,
                'created_at' => $message->created_at->format('H:i'),
                'updated_at' => $message->updated_at->format('H:i'),
            ];
        })->toArray();
        return parent::toArray($request);
    }
}
