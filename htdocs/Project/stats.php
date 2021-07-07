<?php
  session_start();
  if($_SESSION['level'] != 2)
  {
    header("Location: 403.php");
  }
?>
<html>
  <head>
    <link rel = "stylesheet" href = "stylesheet.css">
    <title>Statistics</title>
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
              echo"<li class='active'><a href='stats.php'>Statistics</a></li>";
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
            <h1>Statistics</h1>
        </div>
        <div class="panel-body">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <div id="chart_div"></div>
          <script>
            google.charts.load('current', {packages: ['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawBasic);
            function drawBasic()
            {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Page');
              data.addColumn('number', 'Hits');

              data.addRows([
                <?php
                  $query= mysqli_query($con, "SELECT * FROM `statistics`;");
                  while($stats = mysqli_fetch_array($query))
                  {
                    echo"['" . $stats['name'] . "', " . $stats['value'] . "],";
                  }
                ?>
              ]);

              var options = {
                title: 'Hits Per Page',
                'width':'100%',
                'height':'400',
                'colors':['#ee3a56', '#ffffff'],
                legend:'none',
                hAxis:
                {title: 'Pages'},
                vAxis:
                {title: 'Hits'}
              };

              var chart = new google.visualization.ColumnChart(
                document.getElementById('chart_div'));

              chart.draw(data, options);
            }
            </script>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</hmtl>
