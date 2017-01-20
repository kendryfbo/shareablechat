<?php
session_start();

include_once("../model/helper.php");

$value = array_keys($_POST);
if ($value) {
  $conversation = getConversation($_SESSION['user'],$value[0]);

  if (is_array($conversation)) {
    foreach ($conversation as $value) {
      echo ("<p>".$value."</p>");
    };
  }
}


 ?>
