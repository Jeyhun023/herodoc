@extends('front.partials.app', ['title' => 'Mesajlar - Herodoc', 'description' => 'Sizə gələn bütün mesajları bu səhifədən izləyə bilərsiniz'])
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <main class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div class="box shadow-sm rounded bg-white mb-3 osahan-chat">
                    <h5 class="pl-3 pt-3 pr-3 border-bottom mb-0 pb-3">Mesajlar</h5>
                    <div class="row m-0">
                        <div class="border-right col-lg-12 col-xl-12 px-0">
                            <div class="osahan-chat-left">
                                <div class="osahan-chat-list" id="message-list">
                                    @forelse($chats ?: [] as $chat)
                                      <a href="{{route('chat.check', ['user' => $chat['opponent_user']->id ])}}" id="chat-card-{{$chat['id']}}">
                                          <div class="p-3 d-flex align-items-center border-bottom osahan-post-header overflow-hidden">
                                              <div class="dropdown-list-image mr-3">
                                                  <img class="rounded-circle" src="{{$chat['opponent_user']->image}}" alt="">
                                              </div>
                                              <div class="font-weight-bold mr-1 overflow-hidden">
                                                  <div class="text-truncate">{{$chat['opponent_user']->fullname}}</div>
                                                  <div class="small text-truncate overflow-hidden text-black-50">
                                                      <i class="mdi mdi-check text-primary"></i> {{$chat['last_message']?->content}}
                                                  </div>
                                              </div>
                                              <span class="ml-auto mb-auto">
                                                  <div class="text-right text-muted pt-1 small">{{$chat['last_activity']}}</div>
                                              </span>
                                          </div>
                                      </a>
                                    @empty 
                                        <br>
                                        <div class="col-lg-12" style="background-image: url(/front/images/empty.png);background-repeat: no-repeat;
                                            background-position: center;height: 350px;" id="no-message">
                                            <h4 style="text-align:center">Heç bir mesajınız yoxdur</h4>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>    
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;
var pusher = new Pusher('72ea4455191aff24cbea', {
    authEndpoint: "/broadcasting/auth",
    auth: { headers: { "X-CSRF-Token": "{{csrf_token()}}" } },
    cluster: 'eu'
});

var channel = pusher.subscribe('private-chat-user-{{auth()->id()}}');
channel.bind('messages-edit', function(data) {
    console.log(data);
    $('#no-message').remove();
    $('#chat-card-'+data['chatUser']['id']).remove();
    $('#message-list').prepend(
        `<a href="/chat/`+ data['chatUser']['current_user']['id'] +`/check" id="chat-card-`+ data['chatUser']['id'] +`">`+
            `<div class="p-3 d-flex align-items-center border-bottom osahan-post-header overflow-hidden">`+
                `<div class="dropdown-list-image mr-3">`+
                    `<img class="rounded-circle" src="`+ data['chatUser']['current_user']['image'] +`" alt="">`+
                `</div>`+
                `<div class="font-weight-bold mr-1 overflow-hidden">`+
                    `<div class="text-truncate">`+ data['chatUser']['current_user']['fullname'] +`</div>`+
                    `<div class="small text-truncate overflow-hidden text-black-50">`+
                        `<i class="mdi mdi-check text-primary"></i>`+ data['chatUser']['last_message']['content'] +
                    `</div>`+
                `</div>`+
                `<span class="ml-auto mb-auto">`+
                    `<div class="text-right text-muted pt-1 small">`+ data['chatUser']['last_activity'] +`</div>`+
                `</span>`+
            `</div>`+
        `</a>`
    );
});
</script>
@endpush