<?php
  //includes the database connection Failed
  require_once('dbconn.php');
  if(isset($_POST["username"]))
  {  //username and password sent from form
    $usr =  mysqli_real_escape_string($con, $_POST["username"]);
    $pw =  mysqli_real_escape_string($con, $_POST["password"]);
    //echo "Username: " . $usr ."   Password: " . $pw;

    
    //builds an SQL string and executes query
    $stmt = "SELECT * FROM `users` WHERE `username` ='" . $usr . "';";

    //echo $stmt;
    //$con is coming from the dbconn.php, which is included to establish the mySQL connection
    $result = mysqli_query($con, $stmt);

    //returns the number of rows in a result set (should be 1 if user and pw found)

    $rows = mysqli_num_rows($result);

    //if there is a user & pw matching, then store username and password in session variables and redirect to success page if not then go back the login form.
    $user = mysqli_fetch_assoc($result);
    if ($rows == 1)
    {
      #echo $rows;
      
      #echo $pw;
      #echo $user['pword'];
     /*if(password_verify($pw, $user['pword']))
      {
        echo "match!";
        
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];
        header('location:index.php');
      }*/
      session_start();
        $_SESSION['username'] = $usr;
        $_SESSION['password'] = $pw;
        $_SESSION['level'] = $user['level'];
        header('location:index.php');
    }
    else
    {
      header('location:login.php?msg=failed');
    }
  }
?>
