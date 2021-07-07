<?php
    /*session_start();
    if ((!isset($_SESSION["username"])) || ($_SESSION["tier"] != "1")) {
        header("Location: signin.php");
        exit();
    }
    require_once("connect.php");
    $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '" . $_SESSION["username"] . "';");
    $user = mysqli_fetch_assoc($query);
    $username = $user["username"];*/
?>
.outer
{
  display: table;
  position: absolute;
  height: 100%;
  width: 100%;
}

.middle
{
  display: table-cell;
  vertical-align: middle;
}

.inner
{
  margin-left: auto;
  margin-right: auto;
  width: /*whatever width you want*/;
}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Login System</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <h1></h1>
        <div class="container" style="max-width:640px;">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align:center;">
                    <h1>PHP Login System</h1>
                </div>
					<?php
            #include a database connection file
            include ('dbconn.php');

            #creats SQL statement and executes, returns resultset
            $sql = "SELECT * FROM instruments;";
            $rs = mysqli_query($con, $sql);

            #whilst we have a row in the result set, print data to screen using headings and paragraphs.
            while ($row = mysqli_fetch_array($rs))
            {
                echo "<div class='thumbnail'>";
                echo"<h2>" . $row['instrumentBrand'] . " " . $row['instrumentName'] . "</h2>";
                echo "<h4>" . $row['instrumentCategory'] . "</h4>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<p><a href='edit_instrument.php?id=" . $row['instrumentID'] . "' class='btn btn-warning btn-xs'>Edit</a>";
                echo "<a href='delete_instrument.php?id=" . $row['instrumentID'] . "' class='btn btn-danger btn-xs'>Delete</a></p>";
                #if there is no, image it!
                #if there is an image, echo out to file
                if ($row['imageFileName']!= null)
                {
                  echo "<img src='".$row['imageFileName' ]. "'/>";
                }
                echo "</div>";

            }
          ?>
                    <p>
                        <a href="addform.php" class="btn btn-success btn-block">Add Instrument</a>
                        <a href="signout.php" class="btn btn-danger btn-block">Sign out</a>
                    </p>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
