<?php
  $con=mysqli_connect("localhost","jcheek","password","jcheek");
  //Check connection
  if (mysqli_connect_error())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
