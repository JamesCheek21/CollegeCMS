<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php
  include('dbconn.php');

  #var_dump($_POST);

  #read in values from the addform.html to variables
	$lev = addslashes($_POST['courseLevel']);
	$title = addslashes($_POST['courseTitle']);
	$requirements = addslashes($_POST['requirements']);
  $description = addslashes($_POST['description']);


  try
  {
    #uses variables above to create an INSERT query in order to insert data to drinks table
    $sql = "INSERT INTO pages VAlUES(null, '$lev', '$title', '$requirements', '$description')";
    mysqli_query($con, $sql);

    header("Location: courses.php");

  }
  catch (Exception $e)
  {
    echo "Caught Exception : " . $e->getMessage();
  }
?>
</body>
</html>
