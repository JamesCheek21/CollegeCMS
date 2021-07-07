<?php
  session_start();
  include ('dbconn.php');


  $queryStats = mysqli_query($con, "SELECT * FROM `statistics` WHERE `name` = 'login';");
  while($stats = mysqli_fetch_assoc($queryStats))
  {
    $queryStats2 = mysqli_query($con, "UPDATE `statistics` SET `value` = '" . ($stats['value'] + 1) . "' WHERE `name` = 'login';");
  }
  if($_SESSION['level'] != 2)
  {
    header("Location: 403.php");
  }
?>

<html>
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    <!--<form name="example" method="POST" action="checklogin.php">
      <legend> Login </legend>
      <fieldset>
        Username: <input type="text" name="username">
        Password: <input type="password" name="password">
        <input type="submit">
      </fieldset>
    </form>-->
    <div class="container" style="max-width:640px;">
      <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">
          <h1>Sign Up</h1>
        </div>
        <div class="panel-body">
          <form method="post" action="register.php">
            <p>
              <input name="username" type="text" placeholder="Username" class="form-control" required>
            </p>
            <p>
              <input name="pword" type="password" placeholder="Password" class="form-control" required>
            </p>
            <p>
              <input type="radio" value = 0 name="level" required>Student</input>
              <input type="radio" value = 1 name="level" required>Staff</input>
              <input type="radio" value = 2 name="level" required>Webmaster</input>
            </p>
            <p>
              <button type="submit" class="btn btn-success btn-block">Sign Up</button>
            </p>
            <p>
              <a href="index.php" class="btn btn-danger btn-block ">Back to Home Page</a>
            </p>
          </form>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
