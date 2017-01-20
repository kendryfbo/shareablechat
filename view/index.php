<div class="container">
  <div class="row">
    <aside class="col">
      <h2><?=$_SESSION['user']?></h2>
      <h3>Bio:</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </aside>
    <section class="col-md-8">
      <form id="chatform"  action="" method="post">
        <div class="form-group">
          <label for="friendlist"><h4>Friends</h4></label>
          <select class="form-control" id="friendlist" name="friend" onchange="loadConversation()">
          <?php foreach ($users as $key => $value): ?>
            <option><?= $value ?></option>
          <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-12" >
              <div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
            <input id="message" class="form-control" type="text" name="msg" value="" placeholder="Message">
            <input class="form-control" type="hidden" name="user" value=<?=$_SESSION['user']?> >
            <br>
            <button id="send" class="btn btn-success btn-block" type="button" name="button">Send</button>
        </div>
      </form>
    </section>
  </div>
</div>
