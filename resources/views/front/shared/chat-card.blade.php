@foreach($chats as $chat)
@isset($chat->chat->last_message->content)
<a href="{{route('message.show', ['chat' => $chat->code])}}">
    <div class="p-3 d-flex align-items-center border-bottom osahan-post-header overflow-hidden">
        <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="{{$chat->chat->opponent_user->user->image}}" alt="">
        </div>
        <div class="font-weight-bold mr-1 overflow-hidden">
            <div class="text-truncate">{{$chat->chat->opponent_user->user->fullname}}</div>
            <div class="small text-truncate overflow-hidden text-black-50">
                <i class="mdi mdi-check text-primary"></i> {{$chat->chat->last_message->content}}
            </div>
        </div>
        <span class="ml-auto mb-auto">
            <div class="text-right text-muted pt-1 small">{{$chat->chat->last_activity->format('H:i')}}</div>
        </span>
    </div>
</a>
@endisset
@endforeach