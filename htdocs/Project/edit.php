<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php
  include('dbconn.php');
  #var_dump($_POST);

  #get values from variables
  $id = $_POST['id'];

	$lev = addslashes($_POST['courseLevel']);
	$title = addslashes($_POST['courseTitle']);
	$requirements = addslashes($_POST['requirements']);
	$description = addslashes($_POST['description']);

  try
  {
    #build UPDATE query then execute
    $sql = "UPDATE pages SET courseLevel='" . $lev . "', courseTitle='" . $title . "', requirements = '" . $requirements . "', description='" . $description . "' WHERE pageID=" . $id . ";";
		mysqli_query($con,$sql);
    #echo $sql;

  	header("location: courses.php");
  }
  catch (Exception $e)
  {
    echo "Caught Exception : " . $e->getMessage();
  }
?>
</body>
</html>
