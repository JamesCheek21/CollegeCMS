<?php
  //scan folder for images
  /*$dir = "uploads/";
  $images = scandir($dir);

  //set array to ignore these (these make the folder go back one)
  $ignore = Array(".", "..");

  foreach($images as $img)
  {
    //if it isn't the directory . or ..., then display image using HTML <img> target
    if (!in_array($img, $ignore))
    {
      //create filepath then echo HTML <img> tag
      $fp = $dir . $img;
      echo "<div class='mySlides fade'>
        <div class='numbertext'>1 / 3</div>
        <img class='galleryimg' src='$fp' />
        <div class='text'>Caption Two</div>
      </div>";
    }
  }*/
  session_start();
  include ('dbconn.php');


  $queryStats = mysqli_query($con, "SELECT * FROM `statistics` WHERE `name` = 'gallery';");
  while($stats = mysqli_fetch_assoc($queryStats))
  {
    $queryStats2 = mysqli_query($con, "UPDATE `statistics` SET `value` = '" . ($stats['value'] + 1) . "' WHERE `name` = 'gallery';");
  }
?>
<html>
  <head>
    <link rel = "stylesheet" href = "stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    <style>
      .navbar
      {
        background-color: #ec2048;
      }
      .row > .column
      {
        padding: 0 8px;
      }
      .row:after
      {
        content: "";
        display: table;
        clear: both;
      }
      .column
      {
        float: left;
        width: 25%;
      }
      /* The Modal (background) */
      .modal
      {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
      }
      /* Modal Content */
      .modal-content
      {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 1200px;
      }
      /* The Close Button */
      .close
      {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
      }
      .close:hover,
      .close:focus
      {
        color: #999;
        text-decoration: none;
        cursor: pointer;
      }
      .mySlides
      {
        display: none;
      }
      /* Next & previous buttons */
      .prev,
      .next
      {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
      }
      /* Position the "next button" to the right */
      .next
      {
        right: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover,
      .next:hover
      {
        background-color: rgba(0, 0, 0, 0.8);
      }

      /* Number text (1/3 etc) */
      .numbertext
      {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      .caption-container
      {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
      }

      img.demo
      {
        opacity: 0.6;
      }

      .active,
      .demo:hover
      {
        opacity: 1;
      }

      img.hover-shadow
      {
        transition: 0.3s
      }

      .hover-shadow:hover
      {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
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
            <li class='active'><a href='gallery.php'>Gallery</a></li>";
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
            <h1>Gallery</h1>
        </div>
        <div class="panel-body">
          <?php
            $counter=1;
            //scan folder for images
            $dir = "uploads/";
            $images = scandir($dir);

            //set array to ignore these (these make the folder go back one)
            $ignore = Array(".", "..");

            $arrayImg = array();

            foreach($images as $img)
            {
              //if it isn't the directory . or ..., then display image using HTML <img> target
              if (!in_array($img, $ignore))
              {
                //create filepath then echo HTML <img> tag
                $fp = $dir . $img;
                /*$arrayImg[$counter] = $fp;


                echo
                "<img src='$arrayImg[$counter]' style='max-width:25%; float:left;' onclick='openModal();currentSlide($counter)' class='hover-shadow'>

                <div id='myModal' class='modal' style='margin-top:45px;'>
                  <span class='close cursor' onclick='closeModal()'>&times;</span>
                  <div class='modal-content'>
                      <div class='numbertext'>$counter</div>
                      <img src='$arrayImg[$counter]' style='width:100%'>
                  </div>
                </div>
                ";
                $counter=$counter+1;*/
                echo
                "<div class='gallery'>
                  <a target='_blank' href='$fp'>
                    <img src=$fp style='max-width:25%; float:left;'>
                  </a>
                </div>";

              }
            }
            #var_dump($arrayImg);
          ?>
          </div>
        </div>
      </div>
    </div>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script>
      function openModal()
      {
        document.getElementById('myModal').style.display = 'block';
      }

      function closeModal()
      {
        document.getElementById('myModal').style.display = 'none';
      }

    </script>
  </body>
</html>
