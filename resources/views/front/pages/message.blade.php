@extends('front.partials.app')
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <main class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="box shadow-sm rounded bg-white mb-3 osahan-chat">
                        <div class="row m-0">
                            <div class="col-lg-12 col-xl-12 px-0">
                                <div id="loading" style="text-align:center;margin-top:25px;">
                                    <svg class='spinner' viewBox='0 0 100 100' width='350' height='250'><circle cx='50' cy='50' r='42' transform='rotate(-90,50,50)' /></svg>
                                </div>
                                <div id="message" style="height: 500px;"></div>
                                <form method="POST" class="send_message" action="{{route('message.sendMessages',['chat' => $chat])}}">
                                    @csrf
                                    <input type="hidden" id="chat_code" value="{{$chat}}">
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
<script>
(function worker() {
  $.ajax({
    url: '/lastMessages/'+$("#chat_code").val(), 
    success: function(data) {
      $('#loading').remove();
      $('#message').html(data);
      $("#message-history").animate({
            scrollTop: $('#message-history').prop("scrollHeight")
        }, 0);
    },
    error:function(data) {
        window.location.href = "/messages";
    },
    complete: function() {
      setTimeout(worker, 5000);
    }
  });
})();

$(".send_message").submit(function (e) {
    e.preventDefault();
    var form = $(this);
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            dataType: 'json',
            data: new FormData( this ),
            processData: false,
            contentType: false,
            headers: {
                'X-CSRFToken': $('input[name="csrfToken"]').attr('value')
            },
            beforeSend: function () {
                $('#sendButton').html("<svg class='spinner' viewBox='0 0 100 100' width='20' height='20'><circle cx='50' cy='50' r='42' transform='rotate(-90,50,50)' /></svg>").attr("disabled", true);
                $('#sendMessage').val("");
            },
            success: function (response) {
                $('#newmessage').append(
                    `<div class="d-flex align-items-center osahan-post-header">`+
                        `<div class="dropdown-list-image mr-3 mb-auto">`+
                            `<img class="rounded-circle" src="`+ response.user.image +`" alt="">`+
                        `</div>`+
                        `<div class="mr-1">`+
                            `<div class="text-truncate h6 mb-3">`+ response.user.username +`</div>`+
                            `<p>`+ response.message.content +`</p>`+
                        `</div>`+
                        ` <span class="ml-auto mb-auto">`+
                            `<div class="text-right text-muted pt-1 small">`+ response.message.created_at.substr(11, 5)  +`</div>`+
                        `</span>`+
                    `</div>`
                );

                $("#message-history").animate({
                        scrollTop: $('#message-history').prop("scrollHeight")
                    }, 0);

                $('#sendButton').html("<i class='mdi mdi-send'></i> Göndər").attr("disabled", false);
            },
            error: function (response) {
                $('#sendButton').html("<i class='mdi mdi-send'></i> Göndər").attr("disabled", false);
            }
        });
    return false;
});
</script>
@endpush
