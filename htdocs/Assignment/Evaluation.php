<html>
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

        <h2>Examples</h2>
        <?php
          // define variables and set to empty values
          $nameErr = $emailErr = $genderErr = "";
          $name = $email = $gender = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST")
          {
            if (empty($_POST["name"]))
            {
              $nameErr = "Name is required";
            }
            else
            {
              $name = test_input($_POST["name"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/^[a-zA-Z ]*$/",$name))
              {
                $nameErr = "Only letters and white space allowed";
              }
            }

            if (empty($_POST["email"]))
            {
              $emailErr = "Email is required";
            }
            else
            {
              $email = test_input($_POST["email"]);
              // check if e-mail address is well-formed
              if (!filter_var($email, FILTER_VALIDATE_EMAIL))
              {
                $emailErr = "Invalid email format";
              }
            }

            if (empty($_POST["gender"]))
            {
              $genderErr = "Gender is required";
            }
            else
            {
              $gender = test_input($_POST["gender"]);
            }
          }

          function test_input($data)
          {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        ?>

        <h3>PHP Form Validation Example</h3>
        <p><span class="error">* required field.</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          Name: <input type="text" name="name">
          <span class="error">* <?php echo $nameErr;?></span>
          <br><br>
          E-mail: <input type="text" name="email">
          <span class="error">* <?php echo $emailErr;?></span>
          <br><br>
          Gender:
          <input type="radio" name="gender" value="female">Female
          <input type="radio" name="gender" value="male">Male
          <span class="error">* <?php echo $genderErr;?></span>
          <br><br>
          <input type="submit" name="submit" value="Submit">
        </form>

        <?php
          echo "<h3>Your Input:</h3>";
          echo $name;
          echo "<br>";
          echo $email;
          echo "<br>";
          echo $gender;
        ?>
        <h3>Screen Resolution</h3>
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
        <h3>Browser Detection</h3>
        <?php
    			 $browser = $_SERVER['HTTP_USER_AGENT'];

    			 echo "<p>The full HTTP_USER_AGENT string is: " . $browser . "</p>";

    			 echo "<script> function browserType() { alert('";

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

    			 echo "');}</script>";
		    ?>

		    <button onclick="browserType()">Browser Type</button>
      <h2>Evaluation</h2>
			<p>I’ve discussed why you should use one language over the other when using JavaScript and PHP, but it is
				helpful to implement both in a webpage for certain functions. Above are examples of PHP and JavaScript
				being used and it shows you can get the information you need using JavaScript inside a PHP and display
				the information and store it using PHP, such as the browser detection. If you were to do this purely using
				JavaScript none of the information would be saved anywhere other than the client’s PC and if it was done
				purely on PHP it would not be 100% functional. </p>
			<p>For example the data validation uses mostly PHP and it will detect the invalid data, but will still print
				the data and store it even though it is invalid. If I was to implement and extra step of JavaScript where it
				would check the validity before getting to the printing stage then it would improve on the functionality of the
				form. Another example is the browser detection. That can be done purely using PHP and purely using JavaScript,
				but using both at the same time improves on it as it allows you to click on a button to store the data received
				from the PHP. The screen resolution is very similar as it is pure JavaScript inside a PHP function, that way it
				runs the function and also stores the data in the database so can be called again instead of running the function
				every time. Using PHP to store information received from JavaScript functions is key to ensuring all data is
				collected correctly and securely stored in the database. It is possible to do these functions only using PHP but
				they will not always be as effective and will be harder to accomplish. If you were to use purely JavaScript all
				data will not be stored anywhere except the client’s PC, and people can turn off JavaScript on a website leaving
				a massive security breach as they do, but with PHP this can protect against it. </p>
      <p>Overall, I believe its good practise to implement both languages into a webpage as JavaScript opens many possibilities
				to a webpage and its main downfall is that it is client side. Therefore, implementing it into PHP will solve this issue.
				It is possible to do a lot of functions without JavaScript and staying purely with PHP but functions will be harder to
				create and it has its limitations, which can be met by using JavaScript.</p>
			</section>
			<aside>
			</aside>
			</div>
		<footer>
			Copyright &copy; 2017 James Cheek. All Rights Reserved.
		</footer>
	</body>
</html>
