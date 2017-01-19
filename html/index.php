<?php
session_start();

if (!isset($_SESSION['login']) || !$_SESSION['login']) {
  header("location: login.php");
}

include_once("../view/header.php");
 ?>

<?php include_once("../view/header.php") ?>

<div class="container">
  <div class="row">
    <aside class="col">
      <h2>aside</h2>
      <ul>
        <li>uno</li>
        <li>dos</li>
        <li>tres</li>
      </ul>
    </aside>
    <section class="col-md-8">
      <form id="chatform"  action="" method="post">
        <div class="form-group">
          <label for=""><h2><?= $_SESSION['user'] ?></h2></label>
          <textarea id="msgbox" class="form-control" name="msgbox" rows="8" cols="80"></textarea>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="msg" value="" placeholder="Message">
            <input class="form-control" type="hidden" name="user" value=<?=$_SESSION['user']?> >
            <br>
            <button id="send" class="btn btn-success btn-block" type="button" name="button">Send</button>
        </div>
      </form>
    </section>
  </div>
</div>

<?php include_once("../view/footer.php") ?>
