
$(document).ready(function(){

sendMsg();
setInterval("loadConversation()",500);
});

var sendMsg = function() {
  $("#send").on("click", function(){
    var frm = $("#chatform").serialize();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
          $("#message").val("");
          $("#message").focus();
      }
    };
    xhttp.open("POST","message.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(frm);
  });
};

function loadConversation() {
  var xhttp = new XMLHttpRequest();
  var selected = $("#friendlist").val();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      $("#conversation").html( xhttp.responseText );
      $("#conversation p:last-child").css({"background-color":"lightblue",
                                           "padding-botton": "20px"});
      var height =   $("#conversation").prop("scrollHeight");
      $("#conversation").scrollTop(height);
    };
  };
  xhttp.open("POST","conversation.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.send(selected);
};
