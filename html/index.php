<?php
session_start();

include_once("../model/helper.php");

if (!isset($_SESSION['login']) || !$_SESSION['login']) {

  header("location: login.php");

}

$users = getUsers();
 ?>

<?php include_once("../view/header.php") ?>
<?php include_once("../view/index.php") ?>
<?php include_once("../view/footer.php") ?>
