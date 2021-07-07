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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instruments Page</title>
	  <link rel="stylesheet" href="stylesheet.css">
  </head>
  <body>
    <!-- PHP goes here -->
    <div class="container" style="max-width:640px;">
      <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">
            <h1>Instruments</h1>
        </div>
        <div class="panel-body">
          <?php
            #include a database connection file
            include ('dbconn.php');

            #creats SQL statement and executes, returns resultset
            $sql = "SELECT * FROM instruments;";
            $rs = mysqli_query($con, $sql);

            #whilst we have a row in the result set, print data to screen using headings and paragraphs.
            while ($row = mysqli_fetch_array($rs))
            {
              #echo "<div style='border: 2px solid black;'>";
                echo "<div class='thumbnail'>";
                echo"<h2>" . $row['instrumentBrand'] . " " . $row['instrumentName'] . "</h2>";
                echo "<h4>" . $row['instrumentCategory'] . "</h4>";
                echo "<p>" . $row['description'] . "</p>";
                if($_SESSION['level'] == 1)
                {
                  echo "<p><a href='editform.php?id=" . $row['instrumentID'] . "' class='btn btn-warning btn-xs'>Edit</a>";
                  echo "<a href='delete_instrument.php?id=" . $row['instrumentID'] . "' class='btn btn-danger btn-xs'>Delete</a></p>";
                }



                #if there is no, image it!
                #if there is an image, echo out to file
                if ($row['imageFileName']!= null)
                {
                  echo "<img src='".$row['imageFileName' ]. "'/>";
                }
              echo "</div>";

            }
      	  #echo "<a href ='cpanel.php' class='btn btn-primary btn-block' style='font-size: 18'>Click here to return to control panel</a>";
          ?>
          <p>
              <a href="addform.php" class="btn btn-success btn-block">Add Instrument</a>
              <a href="index.html" class="btn btn-danger btn-block">Sign out</a>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
