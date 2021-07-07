<?php
  session_start();
  //if username or password not set, goes back to login form
  if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
  {
    header("location:loginform.html");
  }
?>

<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
</head>
  <body>
    <div class="container" style="max-width:640px;">
      <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">
          <h1>Control Panel</h1>
        </div>
        <div class="panel-body">
          <form>
            <a href ="viewinstruments.php" class="btn btn-success btn-block">Click here to view instruments</a>
            <p></p>
            <a href ="addform.php" class="btn btn-primary btn-block">Click here to add instruments</a>
            <p></p>
            <a href ="editmenu.php" class="btn btn-info btn-block">Click here to edit instruments</a>
            <p></p>
            <a href ="deletemenu.php" class="btn btn-warning btn-block">Click here to delete instruments</a>
            <p></p>
            <a href="logout.php" class="btn btn-danger btn-block">Click here to log out</a>
            <p></p>
            <a href="gallery.php" class="btn btn-default btn-block">Gallery</a>
        	</form>
        </div>
      </div>
    </div>
  </body>
</html>
