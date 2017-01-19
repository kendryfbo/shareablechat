$(document).ready(function(){

sendMsg();
});

var sendMsg = function() {
  $("#send").on("click", function(e){
    e.preventDefault();
    var frm = $("#chatform").serialize();

    $.ajax({
      type: "POST",
      url: "message.php",
      data: frm
    }).done(funciton(info){

    });
  });
}
