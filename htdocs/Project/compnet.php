<?php
  session_start();
  include ('dbconn.php');


  $queryStats = mysqli_query($con, "SELECT * FROM `statistics` WHERE `name` = 'subjects';");
  while($stats = mysqli_fetch_assoc($queryStats))
  {
    $queryStats2 = mysqli_query($con, "UPDATE `statistics` SET `value` = '" . ($stats['value'] + 1) . "' WHERE `name` = 'subjects';");
  }
?>
<html>
  <head>
    <link rel = "stylesheet" href = "stylesheet.css">
    <title>Computer Networks</title>
    <style>
    .navbar
    {
      background-color: #ec2048;
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
            <li><a href='courses.php'>Course Information</a></li>
            <li class='dropdown active'>
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
    <div class="container" style="max-width:1280px;">
      <div class="panel panel-primary">
        <div class="panel-heading" style="text-align:center;">
            <h1>Computer Networks</h1>
        </div>
        <div class="panel-body">
          <h3>Our computing courses explore the different types of networks and the standards relating to network systems, including local and wide area networks.
            Networks can be either wired or wireless systems and, although much of the underpinning content is similar, our courses explore both.</h3>
          <h3>The hardware and software components used in networks and their operation are explored and learners will develop an understanding of their functions
            and how they relate to each other, particularly how connections are made and the purpose of these connection devices. As users of networks, we work with
            them mostly through the services that they provide, from simple services such as file sharing and communications to more complex services involving security
            and account management. Learners will explore and use the different services available.</h3>
          <h3>For networks to be suitable they must be secure and networks distributed across several physical locations, perhaps via a WAN, makes the ensuring of
            security a complex business. Learners will be exploring the technologies used to create secure systems and putting security procedures and devices in place
            to secure a networked system. Learners will come to understand the risks to businesses from insecure networks.</h3>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</hmtl>
