<?php session_start(); ?>
<html>
<head>
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
    <?php
      include('dbconn.php');

      #GET the instrumentID from the URl (passed via editmenu.php)
      $id = $_GET['id'];

      #if no id value, this has been accessed illegally
      if ($id != null || $id != 0)
      {
        try
        {
          #fetch corresponding row (there should only be one as the WHERE clause is the id)
          $sql = "SELECT * FROM pages WHERE pageID=" . $id . ";";
          $rs = mysqli_query($con, $sql);
          $row = mysqli_fetch_row($rs);

          #store this information in variables#please note, numbers in brackets are array elements (can't use name association)
          $id = $row[0];
          $courseLevel = $row[1];
          $courseTitle= $row[2];
          $requirements = $row[3];
          $description = $row[4];
        }
        catch (Exception $e)
        {
          echo "Caught Exception : " . $e->getMessage();
        }
      }
    ?>
    <div class="container" style="max-width:960px;">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form enctype="multipart/form-data" name="add" method="POST" action="edit.php">
          <fieldset>
            <legend>Edit Page</legend>
            <input type="hidden" value="<?php echo $id; ?>" name="id" required>
            <div class="form-group">
              <label for="inputLevel" class="col-lg-2 control-label">Course Level</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputLevel" placeholder="Course Title" name="courseLevel" value="<?php echo $courseLevel;?>" required/>
                <p></p>
              </div>
            </div>
            <div class="form-group">
              <label for="inputCourse" class="col-lg-2 control-label">Course Title</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputCourse" placeholder="Course Title" name="courseTitle" value="<?php echo $courseTitle;?>" required/>
                <p></p>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-2 control-label">Entry Requirements</label>
              <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="textArea" name="requirements" required><?php echo $requirements;?></textarea>
                <p></p>
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-lg-2 control-label">Description</label>
              <div class="col-lg-10">
                <textarea class="form-control" rows="7" id="textArea" name="description" required><?php echo $description;?></textarea>
                <p></p>
              </div>
            </div>
            <div class="form-group">
                <p></p>
                <button type="submit" class="btn btn-success" >Submit</button>
                <a href='courses.php' class='btn btn-danger'>Back to Courses</a>
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
