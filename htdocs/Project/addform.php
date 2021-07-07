<?php session_start(); ?>
<html>
  <head>
    <title>POST Form</title>
		<link rel="stylesheet" href="stylesheet.css">
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
    <div class="container" style="max-width:960px;">
      <div class="panel panel-primary" style="">
        <div class="panel-body">
          <form name="Add Instruments" method="POST" action="add.php">
          <fieldset>
            <legend>Add Course</legend>
            <div class="form-group">
              <label for="inputLevel" class="col-lg-2 control-label">Course Level</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputLevel" placeholder="Course Level" name="courseLevel"required>
                <p></p>
              </div>
            </div>
            <div class="form-group">
              <label for="inputTitle" class="col-lg-2 control-label">Course Title</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputTitle" placeholder="Course Title" name="courseTitle"required>
                <p></p>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-2 control-label">Entry Requirements</label>
              <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="textArea" name="requirements"required></textarea>
                <p></p>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-2 control-label">Description</label>
              <div class="col-lg-10">
                <textarea class="form-control" rows="7" id="textArea" name="description"required></textarea>
                <span class="help-block">Description of course.</span>
                <p></p>
              </div>
            </div>
                <button type="submit" class="btn btn-success" >Submit</button>
                <a href='courses.php' class='btn btn-danger'>Back to Pages</a>
                <p></p>
              </div>
            </div>
          </fieldset>
        </form>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
