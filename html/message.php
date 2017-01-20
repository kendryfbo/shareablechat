<?php
session_start();

include_once("../model/helper.php");

if ( isset($_POST['user']) && $_POST['friend'] &&  htmlspecialchars($_POST['msg']) ) {

  $user = $_POST['user'];
  $friend = $_POST['friend'];
  $msg = htmlspecialchars($_POST['msg']);

  insertConversation($user,$friend,$msg);
  
}

?>
