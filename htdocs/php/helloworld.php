<html>
	<head>
	</head>
	<body>
		<h1>First PHP Page</h1>
		<h2>Conditonal Statement</h2>
		<?php
			/*
				Simply shows name and age from variables
			*/
			$myname = "James";	//stores a name
			$gender = "Male";
			$age = 18;			//stores user's age

			if ($gender >= Male)
			{
				echo "<p>You are a male!</p>";
			}
			else
			{
				echo "<p>You are a female!</p>";
			}

			echo "Hello " . $myname . "! You are " . $age;
		?>
		<h2>Iteration</h2>
		<h3>Do While Loop</h3>
		<?php
			$x = 1;

			do
			{
				echo "The number is: $x <br>";
				$x++;
			} while ($x <= 5);
			?>
			<h3>For Loop</h3>
			<?php
				$colors = array("red", "green", "blue", "yellow");

				foreach ($colors as $value)
				{
				  echo "$value <br>";
				}
			?>
			<h3>Built-In Functions</h3>
			<?php
				echo "Today is " . date("d/m/Y") . "<br>";
				echo "Today is " . date("l");
			?>
			<h3>User-Defined Funtion</h3>
			<?php
				function call()
				{
					echo"Response";
				}
				call();
				?>
	</body>
</html>
