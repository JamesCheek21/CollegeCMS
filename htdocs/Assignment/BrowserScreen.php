
	<head>
		<title> Web Dev Assignment 1 </title>
		<link rel="stylesheet" href="stylesheet.css" />
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
	</head>

	<body>
		<header>
			<h1>Client Side Scripting Assignment</h1>
		</header>
		<nav>
			<ul>
				<li><a href="Task1a.html">Task 1a</a>
				<li><a href="Task1b.php">Task 1b</a>
				<li><a href="BrowserScreen.php">Broswer Detection & Screen Resolution</a>
				<li><a href="ScriptingIssues.html">Server Scripting Issues</a>
				<li><a href="Evaluation.php">Evaluation</a>
			</ul>
		</nav>
		<div class="c_wrapper">
			<section>
				<h2>Browser Detection</h2>
				<?php
				  $browser = $_SERVER['HTTP_USER_AGENT'];

				  echo "<p>The full HTTP_USER_AGENT string is: " . $browser . "</p>";

				  if (strpos($browser, "MSIE") == true)
				  {
					echo "You are using Internet Explorer";
				  }
				  else if (strpos($browser, "Firefox") == true)
				  {
					echo "You are using Mozilla Firefox";
				  }
				  else if (strpos($browser, "Gecko") == true)
				  {
					echo "You are using Google Chrome";
				  }
				  else
				  {
					echo "You are not using IE, Firefox or Chrome";
				  }
				?>
				<h2>Screen Resolution</h2>
				<?php
					//if h & w parameters within the URL are not set, creat a new URL with parameters.
					//if they are set, then display their content on-screen.
					if (!isset($_GET['width']) || !isset($_GET['height']))
					{
					  echo
					  "<script>
						document.location=\"$PHP_SELF?width=\"+screen.width+\"&height=\"+screen.height;
					  </script>";
					}
					else
					{
					  echo "The screen resolution is " . $_GET['width'] . " x " . $_GET['height'];
					}
				?>

			</section>
			<aside>
			</aside>
			</div>
		<footer>
			Copyright &copy; 2017 James Cheek. All Rights Reserved.
		</footer>
	</body>
