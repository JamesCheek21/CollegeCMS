
<?php
  session_start();
  include ('dbconn.php');


  $queryStats = mysqli_query($con, "SELECT * FROM `statistics` WHERE `name` = 'courses';");
  while($stats = mysqli_fetch_assoc($queryStats))
  {
    $queryStats2 = mysqli_query($con, "UPDATE `statistics` SET `value` = '" . ($stats['value'] + 1) . "' WHERE `name` = 'courses';");
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Courses</title>
	  <link rel="stylesheet" href="stylesheet.css">
    <style>
    .navbar{
      background-color: #ec2048;
    }
    /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
    </style>
  </head>
  <body>

    <?php
    include ('dbconn.php');

    echo
    "<nav class='navbar navbar-default navbar-static-top'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='index.php'>The College Of West Anglia</a>
        </div>
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
          <ul class='nav navbar-nav'>
            <li><a href='index.php'>Home<span class='sr-only'>(current)</span></a></li>
            <li class='active'><a href='courses.php'>Course Information</a></li>
            <li class='dropdown'>
              <a href='ssa.php' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>Subject Specific Areas <span class='caret'></span></a>
              <ul class='dropdown-menu 'role='menu'>
                <li><a href='softdev.php'>Software Development</a></li>
                <li><a href='webdev.php'>Website Development</a></li>
                <li><a href='compnet.php'>Computer Networks</a></li>
                <li><a href='comphard.php'>Computer Hardware and Architecture</a></li>
                <li><a href='compgame.php'>Computer Games Design and Development</a></li>
              </ul>
            </li>
            <li><a href='gallery.php'>Gallery</a></li>";
            if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
            {
            }
            elseif($_SESSION['level'] == 2)
            {
              echo"<li><a href='uploadform.php'>Upload</a></li>";
              echo"<li><a href='stats.php'>Statistics</a></li>";
              echo"<li><a href='signup.php'>Sign Up</a></li>";
            }
          echo"</ul>
          <ul class='nav navbar-nav navbar-right'>";
          if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
          {
            echo"<li><a href='login.php'>Login</a></li>";
          }
          elseif(($_SESSION['level'] == 0) || ($_SESSION['level'] == 1) || ($_SESSION['level'] == 2))
          {
            echo"<li><a href='logout.php'>Logout</a></li>";
          }
          echo
          "</ul>
        </div>
      </div>
    </nav>";
    ?>

  <!-- PHP goes here -->
  <div class="container" style="width: 100%;">
    <div class="panel panel-primary">
      <div class="panel-heading" style="text-align:center;">
        <h1>Courses</h1>
      </div>
      <div class="panel-body">
        <?php
        #include a database connection file
        include ('dbconn.php');

        if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
        {

        }
        elseif(($_SESSION['level'] == 1) || ($_SESSION['level'] == 2))
        {
          echo
          "<div class='btn-group btn-group-justified'>
            <a href='addform.php' class='btn btn-success'>Add Course</a>
          </div>
          <br>";
        }

        #creats SQL statement and executes, returns resultset
        $sql = "SELECT * FROM pages;";
        $rs = mysqli_query($con, $sql);
        echo "<div class='list-group'>";


        while($row= mysqli_fetch_array($rs))
        {
            echo "<a href='#" . $row['pageID'] .  "' class='list-group-item'>" . $row['courseLevel'] .  " " . $row['courseTitle'] . "</a>";

        }
        echo"</div>";
        $sql2 = "SELECT * FROM pages;";
        $rs2 = mysqli_query($con, $sql2);

        #whilst we have a row in the result set, print data to screen using headings and paragraphs.
        while ($row2 = mysqli_fetch_array($rs2))
        {

          #echo "<div style='border: 2px solid black;'>";
          echo "<div class='thumbnail'>";
            echo"<h2 id=" . $row2['pageID'] . ">" . $row2['courseLevel'] . " " . $row2['courseTitle'] . "</h2>";
            echo"<h3> Entry Requirements </h3>";
            echo"<p>" . $row2['requirements'] . "</p>";
            echo"<h3> Description </h3>";
            echo "<p>" . $row2['description'] . "</p>";

            if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
            {

            }
            elseif(($_SESSION['level'] == 1) || ($_SESSION['level'] == 2))
            {
              echo "<p><a href='editform.php?id=" . $row2['pageID'] . " 'class='btn btn-warning btn-xs'>Edit</a>";
              echo "<a href='delete.php?id=" . $row2['pageID'] . "' class='btn btn-danger btn-xs'>Delete</a></p>";
            }
            echo "<class='pull-right'><a href=''#top'>Back to top</a>";
          echo "</div>";

          /*echo "<div class='thumbnail'>";
          echo
          "<button onclick = openModal('" . (string)$row2['courseLevel'] . (string)$row2['courseTitle'] . "')>" . $row2['courseLevel'] . $row2['courseTitle'] . "</button>";

          echo"
          <div id='" . $row2['courseLevel'] . $row2['courseTitle'] . "' class='modal'>
              <!-- Modal content-->
              <div class='modal-content'>
                <div class='modal-header'>";
                  echo"<button type='button' class='close' data-dismiss='modal' onclick = closerModal('" . (string)$row2['courseLevel'] . (string)$row2['courseTitle'] ."')>&times;</button>";
                  echo"<h4 class='modal-title'>" . $row2['courseLevel'] . $row2['courseTitle'] . "</h4>
                </div>";
                echo"<div class='modal-body'>";
                echo "<div class='thumbnail'>";
                  echo"<h2>" . $row2['courseLevel'] . " " . $row2['courseTitle'] . "</h2>";
                  echo"<h3> Entry Requirements </h3>";
                  echo"<p>" . $row2['requirements'] . "</p>";
                  echo"<h3> Description </h3>";
                  echo "<p>" . $row2['description'] . "</p>";
                echo"</div>
              </div>
              </div>
            ";

            if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
            {

            }
            elseif(($_SESSION['level'] == 1) || ($_SESSION['level'] == 2))
            {
              echo "<p><a href='editform.php?id=" . $row2['pageID'] . " 'class='btn btn-warning btn-xs'>Edit</a>";
              echo "<a href='delete.php?id=" . $row2['pageID'] . "' class='btn btn-danger btn-xs'>Delete</a></p>";
            }
            echo "<class='pull-right'><a href=''#top'>Back to top</a>";
          echo "</div>";*/


        }
        #echo "<a href ='cpanel.php' class='btn btn-primary btn-block' style='font-size: 18'>Click here to return to control panel</a>";
        ?>
      <br>
      <!--<class="pull-right"><a href="#top">Back to top</a>-->
      <br>
    </div>
    </div>
  </div>
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  </body>
</html>
