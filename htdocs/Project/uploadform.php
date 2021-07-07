<!--<form enctype="multipart/form-data" action="upload.php" method="POST">
  Choose file to upload: <input name="uploaded_file" type= "file" /><br />
   The max file size is within a hidden field. This is set to 2MB and will be handed later within the PHP script.
  <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
  <input type="submit" value="Upload file"  />
</form>
<p>Brand: <input type="text" name="instrumentBrand"></p>
<p>Name: <input type="text" name="instrumentName"></p>
<p>Category: <input type="text" name="instrumentCategory"></p>
<p>Description: <input type="text" name="description"></p>
<p><input type="file" name="image"></p>
<p><input type="submit"></p>
</form>
<form class="form-horizontal">-->
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
    <title>Upload</title>
    <style>
    .navbar
    {
      background-color: #ec2048;
    }
    .btn-file
    {
      position: relative;
      overflow: hidden;
    }
    .btn-file input[type=file]
    {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
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
              echo"<li class='active'><a href='uploadform.php'>Upload</a></li>";
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
            <h1>Upload</h1>
        </div>
        <div class="panel-body">
          <form class="form-horizontal"enctype="multipart/form-data" action="upload.php" method="POST">
            <fieldset>
              <div class="col-lg-6 col-sm-6 col-12">
                <div class="input-group">
                  <label class="input-group-btn">
                    <span class="btn btn-default">
                      Browse&hellip; <input name="uploaded_file" type="file" style="display: none;">
                    </span>
                  </label>
                  <input type="text" class="form-control" readonly>
                </div>
              </div>
              <!--Choose file to upload: <input name="uploaded_file" type= "file"/><br />
               The max file size is within a hidden field. This is set to 2MB and will be handed later within the PHP script. -->
              <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
              <input type="submit" value="Upload file" class="btn btn-success" />
              <?php
                if(isset($_GET["msg"]) && $_GET["msg"] == 'failed')
                {
                  echo "Invalid File";
                }
                elseif (isset($_GET["msg"]) && $_GET["msg"] == 'exists') {
                  echo "File exists";
                }
              ?>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    $(function()
    {
      // We can attach the `fileselect` event to all file inputs on the page
      $(document).on("change", ":file", function()
      {
        var input = $(this), numFiles = input.get(0).files ? input.get(0).files.length : 1, label = input.val().replace(/\\/g, "/").replace(/.*\//, "");
        input.trigger("fileselect", [numFiles, label]);
      });

      // We can watch for our custom `fileselect` event like this
      $(document).ready(function()
      {
        $(":file").on("fileselect", function(event, numFiles, label)
        {
          var input = $(this).parents(".input-group").find(":text"), log = numFiles > 1 ? numFiles + " files selected" : label;

          if (input.length)
          {
            input.val(log);
          }
          else
          {
            if (log) alert(log);
          }
        });
      });
    });
    </script>
  </body>
</hmtl>
