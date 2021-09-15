@php $user = auth()->user()->id; @endphp
@foreach ($chat->messages as $message)
    @if ($message->user_id_from == $user)
        <div class="d-flex align-items-center osahan-post-header chat-header">
            <div class="message-user">
                <div class="mr-1">    
                    <p class="message-content">{{ $message->content }}</p>
                </div>
                <span class="ml-auto mb-auto">
                    <div class="text-right text-muted pt-1 small date-content">{{ $message->created_at->format('H:i') }}</div>
                </span>
            </div>
        </div>
    @else
        <div class="d-flex align-items-center osahan-post-header chat-header">
            <div class="message-opponent">
                <div class="mr-1">
                    <p class="message-content">{{ $message->content }}</p>
                </div>
                <span class="ml-auto mb-auto date-header">
                    <div class="text-right text-muted pt-1 small date-content">{{ $message->created_at->format('H:i') }}</div>
                </span>
            </div>
        </div>
    @endif
@endforeach
