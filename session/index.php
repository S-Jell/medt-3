<?php 
  include 'db.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Index</title>
  <?php 
  include 'links.php';
 ?>
</head>
<body>
<div class="container" style="margin-top:20px">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
      <?php
        if(isset($_GET['wrong_input']))
        {
          echo '<h1 style="font-size:40px">Wrong password or username</h1>';
        }
       ?>
      <form action="login.php" method="post">
        <div class="form-group">
          <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="password" name="password"  class="form-control form-control-lg" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-lg pull-left">Login</button>
      </form>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
</body>
</html>