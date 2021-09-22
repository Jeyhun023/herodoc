@extends('front.partials.app', ['title' => $chat->opponent_user->user->fullname.' - Herodoc', 'description' => 'Seçdiyiniz insanla bu səhifədə sürətli çat sistemi ilə mesajlaşa bilərsiniz'])
@section('content')
    <div class="py-5" style="padding-top:1rem!important">
        <div class="container">
            <div class="row">
                <main class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm rounded bg-white mb-3 osahan-chat">
                        <div class="row m-0">
                            <div class="col-lg-12 col-xl-12 px-0">
                                <div class="p-3 d-flex align-items-center  border-bottom osahan-post-header">
                                    <div class="font-weight-bold mr-1 overflow-hidden">
                                        <div class="text-truncate">{{ $chat->opponent_user->user->fullname }}
                                        </div>
                                        <div class="small text-truncate overflow-hidden text-black-50">
                                            {{ $chat->opponent_user->user->jobname }}
                                        </div>
                                    </div>
                                </div>
                                <div class="osahan-chat-box p-3 border-top border-bottom bg-light message-history" id="message-history">
                                    <div id="loading" style="text-align:center;position:absolute;display:none">
                                        <svg class='spinner' viewBox='0 0 100 100' width='25' height='25'><circle cx='50' cy='50' r='42' transform='rotate(-90,50,50)' /></svg>
                                    </div>
                                    @php
                                        $date = '';
                                        $user = auth()->user();
                                        $last_opponent_message_id = 0;
                                        $last_user_message_id = 0;
                                        $first_message_id = 0;
                                    @endphp
                                    @foreach ($chat->messages as $message)
                                        @if($loop->iteration == 1) @php $first_message_id = $message->id @endphp @endif
                                        @if ($message->created_at->format('d.m.Y') != $date)
                                            @php $date = $message->created_at->format('d.m.Y') @endphp
                                            <div class="text-center my-3">
                                                <span class="px-3 py-2 small bg-white shadow-sm  rounded">{{ $date }}</span>
                                            </div>
                                        @endif

                                        @if ($message->user_id_from == $user->id)
                                            @php 
                                                $user_from = $user; 
                                                $last_user_message_id = $message->id;
                                            @endphp
                                            
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
                                            @php
                                                $user_from = $chat->opponent_user->user; 
                                                $last_opponent_message_id = $message->id;
                                            @endphp
                                            
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
                                    @if($last_opponent_message_id == 0)
                                        @php $last_opponent_message_id = $last_user_message_id @endphp
                                    @endif
                                </div>
                                <form method="POST" class="send_message" action="{{route('message.sendMessages',['chat' => $chat->code])}}">
                                    @csrf
                                    <input type="hidden" id="chat_code" value="{{$chat->code}}">
                                    <input type="hidden" id="last_opponent_message_id" value="{{$last_opponent_message_id}}">
                                    <input type="hidden" id="first_message_id" value="{{$first_message_id}}">
                                    <div class="w-100 border-top border-bottom">
                                        <textarea placeholder="Mesaj yaz…" class="form-control border-0 p-3 shadow-none"
                                            rows="2" name="content" id="sendMessage"></textarea>
                                    </div>
                                    <div class="p-3 d-flex align-items-center">
                                        <div class="overflow-hidden">
                                            <button type="button" class="btn btn-light btn-sm rounded">
                                                <i class="mdi mdi-image"></i>
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm rounded">
                                                <i class="mdi mdi-paperclip"></i>
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm rounded">
                                                <i class="mdi mdi-camera"></i>
                                            </button>
                                        </div>
                                        <span class="ml-auto">
                                            <button type="submit" class="btn btn-success btn-sm rounded" id="sendButton">
                                                <i class="mdi mdi-send"></i> Göndər
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="/front/js/chat.js" type="text/javascript"></script>
@endpush
