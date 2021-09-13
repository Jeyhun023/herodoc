<div class="p-3 d-flex align-items-center  border-bottom osahan-post-header">
    <div class="font-weight-bold mr-1 overflow-hidden">
        <div class="text-truncate">{{ $chat->opponent_user->user->fullname }}
        </div>
        <div class="small text-truncate overflow-hidden text-black-50">
            {{ $chat->opponent_user->user->jobname }}
        </div>
    </div>
</div>
<div class="osahan-chat-box p-3 border-top border-bottom bg-light" style="height:450px" id="message-history">
    @php
        $date = '';
        $user = auth()->user();
    @endphp
    @foreach ($chat->messages as $message)

        @if ($message->user_id_from == $user->id)
            @php $user_from = $user; @endphp
        @else
            @php $user_from = $chat->opponent_user->user; @endphp
        @endif

        @if ($message->created_at->format('d.m.Y') != $date)
            @php $date = $message->created_at->format('d.m.Y') @endphp
            <div class="text-center my-3">
                <span class="px-3 py-2 small bg-white shadow-sm  rounded">{{ $date }}</span>
            </div>
        @endif
        <div class="d-flex align-items-center osahan-post-header">
            <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="{{ $user_from->image }}"
                    alt=""></div>
            <div class="mr-1">
                <div class="text-truncate h6 mb-3">{{ $user_from->username }}
                </div>
                <p>{{ $message->content }}</p>
            </div>
            <span class="ml-auto mb-auto">
                <div class="text-right text-muted pt-1 small">{{ $message->created_at->format('H:i') }}</div>
            </span>
        </div>
    @endforeach
    <div id="newmessage"></div>
</div>
