<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php
	session_start();
	require_once('dbconn.php');

  #var_dump($_POST);

  #read in values from the addform.html to variables
	$usr = mysqli_real_escape_string($con, $_POST['username']);
	$pw = mysqli_real_escape_string($con, $_POST['pword']);
	$lev = mysqli_real_escape_string($con, $_POST['level']);
	/*$options = [
	'cost' => 11,
	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
	$pw= password_hash($pw, PASSWORD_BCRYPT, $options)."\n";*/

  try
  {
    #uses variables above to create an INSERT query in order to insert data to drinks table
    $sql = "INSERT INTO users VAlUES('$usr', '$pw', '$lev')";
    mysqli_query($con, $sql);



    header("Location: index.php");

  }
  catch (Exception $e)
  {
    echo "Caught Exception : " . $e->getMessage();
  }
?>
</body>
</html>
