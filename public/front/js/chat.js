$("#sendMessage").keypress(function (e) {
    if(e.which === 13 && !e.shiftKey) {
        e.preventDefault();
        $(this).closest("form").submit();
    }
});

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
                  $('#sendMessage').val("");
              }
          });
    return false;
});
  
$(document).ready(function() {
    $("#message-history").animate({
        scrollTop: $('#message-history').prop("scrollHeight")
    }, 0);
});
  
