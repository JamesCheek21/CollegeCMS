<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php
  include('dbconn.php');

  #var_dump($_POST);

  #read in values from the addform.html to variables
  $brand = $_POST['instrumentBrand'];
  $name = $_POST['instrumentName'];
  $category = $_POST['instrumentCategory'];
  $description = $_POST['description'];
  $image = $_POST['image'];

  try
  {
    #uses variables above to create an INSERT query in order to insert data to drinks table
    $sql = "INSERT INTO instruments VAlUES(null, '$brand', '$name', '$category', '$description', '$image')";
    mysqli_query($con, $sql);

    header("Location: viewinstruments.php");

  }
  catch (Exception $e)
  {
    echo "Caught Exception : " . $e->getMessage();
  }
	echo "<a href='viewinstruments.php' class='btn btn-danger'>Back to Instruments</a>";
?>
</body>
</html>
