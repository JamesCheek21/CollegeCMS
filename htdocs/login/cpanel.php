<?php
  session_start();
  //if username or password not set, goes back to login form
  if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
  {
    header("location:loginform.html");
  }
?>

<html>
  <body>
    <h1>Control Panel Will Go Here!</h1>
    <a href="logout.php">Click here to log out</a>
  </body>
</html>
