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

  $user = $_SESSION['user'];
  $connection = new PDO(HOST,USER,PASS);

  if ($connection && $user) {

    $query = $connection->prepare("SELECT user FROM users where user!=:user");

    $query->bindParam(':user',$user);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_COLUMN);

    return $result;

  }
};


function getId($user) {

  $connection = new PDO(HOST,USER,PASS);

  if ($connection) {

    $query = $connection->prepare("SELECT id FROM users where user=:user");

    $query->bindParam(':user',$user);
    $query->execute();

    $result = $query->fetchColumn();

    return $result;
  }
}


/* insert in DB the msg */
function insertMessage($userid,$friendid,$msg) {

  $connection = new PDO(HOST,USER,PASS);

  if ($connection) {

    $query = $connection->prepare("INSERT INTO chats (id,userid,friendid,chat,time)
    VALUES (NULL,:userid,:friendid,:msg,NOW())");

    $query->bindParam(':userid',$userid);
    $query->bindParam(':friendid',$friendid);
    $query->bindParam(':msg',$msg);
    $query->execute();

  }
}
/* This function do several things:
*       - Get the userId from the database
*       - Insert in the msg the name of the person who sent it
*       - Insert for each user the msg in case one of then want to delete his conversation
*         the other one can keep a copy of it.
*
*For the short amount of time i get the name of the user and then look for the id. Iknow its not the best practice.
*/
function insertConversation($user,$friend,$msg) {

  $userid = getId($user);
  $friendid = getId($friend);
  $msg = $user.": ".$msg;
  // this should be do it in a transaction to ensure both or none get inserted in DB
  insertMessage($userid,$friendid,$msg);
  insertMessage($friendid,$userid,$msg);
}

function getConversation($user,$friend) {

  $userid = getId($user);
  $friendid = getId($friend);

  $connection = new PDO(HOST,USER,PASS);

  if ($connection) {

    $query = $connection->prepare("SELECT chat FROM chats WHERE userid=:userid AND friendid=:friendid ORDER BY time ASC");

    $query->bindParam(':userid',$userid);
    $query->bindParam(':friendid',$friendid);
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_COLUMN);

    return $result;
  }

}

?>
