<?php
  //includes the database connection Failed
  include('dbconn.php');

  //username and password sent from form
  $usr = $_POST["username"];
  $pw = $_POST["password"];


  //echo "Username: " . $usr ."   Password: " . $pw;

  //builds an SQL string and executes query
  $stmt = "SELECT * FROM users WHERE username='$usr' AND pword='$pw';";

  //echo $stmt
  //$con is coming from the dbconn.php, which is included to establish the mySQL connection
  $result = mysqli_query($con, $stmt);

  //returns the number of rows in a result set (should be 1 if user and pw found)

  $rows = mysqli_num_rows($result);

  $user = mysqli_fetch_assoc($result);

  //echo $rows;
  //if there is a user & pw matching, then store username and password in session variables and redirect to success page if not then go back the login form.

  if ($rows == 1)
  {
    session_start();
    //echo "match!";
    $_SESSION['username'] = $usr;
    $_SESSION['password'] = $pw;
    $_SESSION['level'] = $user['level'];
    header('location:viewinstruments.php');
  }
  else
  {
    echo "<h1> Username Or Password does not exist</h1>";
  }
?>
