<?php
session_start();

include_once("../model/helper.php");

if (isset($_POST['user'])) {

  if (login($_POST['user'])) {
    header("location: index.php");
  }
}

?>

<?php include_once("../view/header.php") ?>
<?php include_once("../view/login.php") ?>
<?php include_once("../view/footer.php") ?>
