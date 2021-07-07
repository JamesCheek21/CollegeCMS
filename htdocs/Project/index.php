<?php
  session_start();
  include ('dbconn.php');


  $queryStats = mysqli_query($con, "SELECT * FROM `statistics` WHERE `name` = 'home';");
  while($stats = mysqli_fetch_assoc($queryStats))
  {
    $queryStats2 = mysqli_query($con, "UPDATE `statistics` SET `value` = '" . ($stats['value'] + 1) . "' WHERE `name` = 'home';");
  }
?>
<html>
  <head>
    <link rel = "stylesheet" href = "stylesheet.css">
    <title>Home</title>
    <style>
    .navbar
    {
      background-color: #ec2048;
    }
    </style>
  </head>
  <body>
    <!--<div class="" style="width:100%; height:100vh; background-image:url('maxresdefault.jpg'); background-position:center; backround-size:cover">
      <div style="width:100%; height:100%; background-color:rgba(0,0,0,0.65); diplay:flex; aligh-itme:centre; justify-content:center; color:#ffffff">-->
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
                <li class='active'><a href='index.php'>Home<span class='sr-only'>(current)</span></a></li>
                <li><a href='courses.php'>Course Information</a></li>
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
        <div class="container" style="max-width:1280px;">
          <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center;">
                <h1>Computing Home Page</h1>
            </div>
            <div class="panel-body">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2414.6637760428766!2d0.40847671581629674!3d52.75630077985959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d78b3b39b3752d%3A0xbebfdeeeb0ec6a27!2sCollege+of+West+Anglia%2C+King&#39;s+Lynn+Campus!5e0!3m2!1sen!2suk!4v1495627196921" width="33%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2420.0054144121214!2d0.16680221617255753!3d52.65987977984099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d80321555124e1%3A0x69591b69ae1322c5!2sThe+College+of+West+Anglia%2C+Wisbech+Campus!5e0!3m2!1sen!2suk!4v1495627588009" width="33%" height="450" frameborder="0" style="border:0" float:"float" allowfullscreen></iframe>
              
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2442.793448461461!2d0.16312021616057928!3d52.247135279763384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d871b9aa07727f%3A0xa74767c835702b0c!2sCollege+of+West+Anglia%2C+Cambridge+Campus!5e0!3m2!1sen!2suk!4v1495627722885" width="33%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              <h2>Contact Us</h2>
              <table style="width:100%">
                <tr>
                  <td><h3>Kings Lynn</h3></td>
                  <td><h3>Wisbech</h3></td>
                  <td><h3>Cambridge</h3></td>
                </tr>
                <tr>
                  <td><i>Tennyson Ave</i></td>
                  <td><i>Ramnoth Rd</i></td>
                  <td><i>Landbeach Rd</i></td>
                </tr> 
                <tr>
                  <td><i>King's Lynn</i></td>
                  <td><i>Wisbech</i></td>
                  <td><i>Cambridge</i></td>
                </tr>
                <tr>
                  <td><i>PE30 2QW</i></td>
                  <td><i>PE13 2JE</i></td>
                  <td><i>CB24 6DB</i></td>
                <tr>
                  <td><i>01553 761144</i></td>
                  <td><i>01945 582561</i></td>
                  <td><i>01223 860701</i></td>
                </tr>
              </table>
            </div>
        </div>
      </div>
      <!--</div>
    </div>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</hmtl>
