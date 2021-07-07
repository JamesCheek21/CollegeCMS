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
    <title>Computer Games Design and Development</title>
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
            <h1>Computer Games Design and Development</h1>
        </div>
        <div class="panel-body">
          <h3>To produce a successful game requires a wide variety of skills and knowledge as well as passion and commitment. Development
            of the game is the role of the Studio team, and includes, designers, artists, modellers, programmers and testers. In order to
            develop an understanding of these roles you will develop the underlying skills and knowledge in the first year of the course,
            and apply this in a development oriented environment in the second year.</h3>
          <h2>Digital Graphics</h2>
          <h3>Anyone considering a career in the computer games industry needs to be aware of the various disciplines and skills relevant to
            the industry which may be outside their own particular interest or career goals. For example, anyone involved in computer games
            development must be familiar with the creation of digital images, digital graphics being the basis on which computer games are sold.
            The creation of digital graphics is relevant to all aspects of design and these skills are highly sought after in the games industry.
            Those who aspire to work in this industry should therefore gain basic practical experience in the production and development of digital
            graphics for use in computer games in order to communicate ideas or develop a specialism. Learners will become familiar with the basic
            tools and techniques of the digital graphics software used to produce images for computer games. These techniques form the basis of the
            development of graphics for game poster production, game packaging, in-game graphics such as head up display graphics, sprite graphics,
            background graphics, image textures and concept art graphics – in short for all print and screen graphics for computer games. The digital
            graphics process includes enhancing or transforming digitally captured images by means of specialist image editing software. Through
            following this unit learners will develop skills in using digital imaging software by producing digitally manipulated visual material.
            Learners will also have opportunities to experiment with graphic styles used to set mood and theme in computer game products.</h3>
          <h2>Game Development</h2>
          <h3>In this course, you will gain experience of the tools and techniques used in developing games for a variety of platforms. This will include
            including using software such as Gimp/Photoshop and Blender/Maya to develop 2D and 3D assets. You will also learn to analyse and critique existing
            games, digital and film media products in order to understand what makes products interactive and exciting for users. Finally you will use these
            skills as well as scripting and Flash development to produce individual interactive games and cut scenes. You will be expected to produce static
            and animated assets for use in cut scenes and game levels. Flash, Blueprints, Kismet and GML will be used to script the gameplay you design, combined
            with level and map skills using Game Maker, and Unreal Development Environments (UDK and UE4) to produce functional 2D and 3D games within a team
            environment. Students who wish to progress after the course may use these assets to produce a final show reel for job or university applications. These
            areas will also be supported by work including presentation, communication and working in the games industry to provide you with a rounded experience of
            how commercial games and digital media produce are specified and developed.</h3>
          <h2>3D Modelling</h2>
          <h3>3D modelling is the art of creating characters and objects for 3D models, including life forms, scenery, vegetation, furniture, and vehicles. It is created
            by means of 3D computer application software. 3D modellers are sometimes also responsible for applying textures to objects, characters, models and items, such
            as the surfaces of walls and floors of buildings.This is highly skilled work which requires considerable knowledge of lighting, perspective, materials, and
            visual effects. Specialist software packages are used to create the models and modellers must portray the models as realistically as possible in an efficient
            and effective way, making the most appropriate use of the technology.Learners will have the opportunity to use a 3D modelling software application to produce
            3D models for a scene. 3D modelling concepts are complex and learners are encouraged to research the use of 3D modelling within the interactive media industry.
            Learners will develop an awareness of how rendered 3D models are displayed on a computer screen. An appreciation of the geometric theory underlying 3D work will
            help learners understand the technical language used by modellers. Learners will have the opportunity to devise and develop original ideas through interpreting
            creative briefs and considering potential target audiences. They will develop skills in drafting pre-visualisation sketches and storyboards. Developing these
            planning skills will form a habit of preparation and workflow management which will be valuable to any entrant to the interactive media industry. Learners will
            develop practical computer modelling skills and create 3D models using a range of techniques, including box and extrusion modelling and rendering.</h3>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</hmtl>
