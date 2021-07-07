<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php
  include ('dbconn.php');

  #the instrumentID os POSTed from deletemenu.php
  $id = $_GET['id'];

  #build a DELETE sql query using the id value, then executes the query.
  try
  {
    $sql = "DELETE FROM pages WHERE pageID=" . $id . ";";
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
