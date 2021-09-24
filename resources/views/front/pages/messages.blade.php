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
                                <div class="osahan-chat-list">
                                    <div id="loading" style="text-align:center;margin-top:25px;">
                                        <svg class='spinner' viewBox='0 0 100 100' width='350' height='250'><circle cx='50' cy='50' r='42' transform='rotate(-90,50,50)' /></svg>
                                    </div>
                                    <div id="chats" style="height: 500px;"></div>
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
<script>
(function worker() {
  let html = `<br><div class="col-lg-12" style="background-image: url(/front/images/empty.png);background-repeat: no-repeat;`+
    `background-position: center;height: 350px;">`+
        `<h4 style="text-align:center">Heç bir mesajınız yoxdur</h4>`+
    `</div>`;
  $.ajax({
    url: '/loadChats', 
    success: function(data) {
      $('#loading').remove();
      if(data == ""){
        if($('#chats').html() != html){
            $('#chats').html(html);
        }
      }else{
        $('#chats').html(data);
      }
    },
    complete: function() {
      setTimeout(worker, 7000);
    }
  });
})();
</script>
@endpush