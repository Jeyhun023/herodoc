(function worker() {
    $.ajax({
      url: '/lastMessages/'+$("#chat_code").val()+'/'+$("#last_opponent_message_id").val(),
      success: function(data) {
          if(data.html && data.html !=""){
              $("#last_opponent_message_id").val(data.last_message_id);
              $('#message-history').append(data.html);
              $("#message-history").animate({
                      scrollTop: $('#message-history').prop("scrollHeight")
                  }, 0);
          }
      },
      complete: function() {
        setTimeout(worker, 5000);
      }
    });
  })();
  
  $(".send_message").submit(function (e) {
      e.preventDefault();
      var form = $(this);
      var now = new Date();
      var time = ("0" + now.getHours()).slice(-2) + ":" + ("0" + now.getMinutes()).slice(-2);
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
                  if($('#sendMessage').val() && $('#sendMessage').val() !=""){
                      $('#message-history').append(
                          `<div class="d-flex align-items-center osahan-post-header chat-header">`+
                              `<div class="message-user">`+
                                  `<div class="mr-1">`+
                                      `<p class="message-content">`+ $('#sendMessage').val() +`</p>`+
                                  `</div>`+
                                  ` <span class="ml-auto mb-auto">`+
                                      `<div class="text-right text-muted pt-1 small date-content">`+ time +`</div>`+
                                  `</span>`+
                              `</div>`+
                          `</div>`
                      );
                  }
                  $("#message-history").animate({
                          scrollTop: $('#message-history').prop("scrollHeight")
                      }, 0);
  
                  $('#sendMessage').val("");
  
              },
              success: function (response) {
                  console.log(response);
              },
              error: function (response) {
                  console.log(response);
              }
          });
      return false;
  });
  
  $(document).ready(function() {
      $("#message-history").animate({
          scrollTop: $('#message-history').prop("scrollHeight")
      }, 0);
  });
  
  $(window).on('load', function () {
      $("#message-history").scrollTop($("#message-history")[0].scrollHeight);
      var isLoad = true;
      $('#message-history').scroll(function(){
          if ($('#message-history').scrollTop() == 0 && isLoad){
              $('#loading').css('display', 'block');
              isLoad = false;
              $.ajax({
                  url:'/loadMessages/'+$("#chat_code").val()+'/'+$("#first_message_id").val(),
                  success: function(data) {
                      if(data.html && data.html !=""){
                          $('#message-history').scrollTop(20);
                          $("#first_message_id").val(data.first_message_id);
                          $('#loading').after(data.html);
                          isLoad = true;
                      }
                      $('#loading').css('display', 'none');
                  }                
              });
          }
      });
   });