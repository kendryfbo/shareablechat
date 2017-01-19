<?php
define ("HOST",'mysql:host=127.0.0.1;dbname=shareablechat');
define ("USER",'root');
define ("PASS",'');

/* check connection to DB */
function connect() {

  $connection = new PDO(HOST,USER,PASS);
  return $connection;

}

/* Check user Login */
function login($user) {

  $_SESSION['login'] = false;
  $_SESSION['user'] = '';
  $connection = new PDO(HOST,USER,PASS);

  if ($connection) {

    $query = $connection->prepare("SELECT 1 FROM users WHERE user=:user");
    $query->bindParam(":user",$user);
    $query->execute();

    $result = $query->fetchColumn();

    if ($result) {

      $_SESSION['login'] = true;
      $_SESSION['user'] = $user;
      return true;

    } else
      return false;

  } else
    return false;
};

/* Get users from DB */
function getUsers(){

  $connection = new PDO(HOST,USER,PASS);

  if ($connection) {

    $query = $connection->prepare("SELECT user FROM users");
    $query->execute();

    $result = $query->fetchColumn();

    if ($result) {

    # code here

    }

  }
};

?>
