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

  $name = $_POST['instrumentName'];
  $category = $_POST['instrumentCategory'];
  $description = $_POST['description'];

  try
  {
    #build UPDATE query then execute
    $sql = "UPDATE instruments SET instrumentName='" . $name . "', instrumentCategory ='" . $category . "', description='" . $description . "' WHERE instrumentID=" . $id . ";";

    #echo $sql;
    mysqli_query($con, $sql);
    header("location: viewinstruments.php");
	}
  catch (Exception $e)
  {
    echo "Caught Exception : " . $e->getMessage();
  }
?>
</body>
</html>
