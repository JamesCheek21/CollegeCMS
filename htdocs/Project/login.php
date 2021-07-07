<?php
  session_start();
  include ('dbconn.php');


  $queryStats = mysqli_query($con, "SELECT * FROM `statistics` WHERE `name` = 'login';");
  while($stats = mysqli_fetch_assoc($queryStats))
  {
    $queryStats2 = mysqli_query($con, "UPDATE `statistics` SET `value` = '" . ($stats['value'] + 1) . "' WHERE `name` = 'login';");
  }
?>

<html>
  <head>
    <title>Login</title>
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
          <h1>Login Form</h1>
        </div>
        <div class="panel-body">
          <form method="post" action="checklogin.php">
            <?php
              if(isset($_GET["msg"]) && $_GET["msg"] == 'failed')
              {
                echo "Incorrect Username or Password";
              }
            ?>
            <p>
              <input name="username" type="text" placeholder="Username" class="form-control" required>
            </p>
            <p>
              <input name="password" type="password" placeholder="Password" class="form-control"required>
            </p>
            <p>
              <button type="submit" class="btn btn-success btn-block"required>Sign In</button>
            </p>
            <p>
              <a href="index.php" class="btn btn-danger btn-block "required>Back to Home Page</a>
            </p>

          </form>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
