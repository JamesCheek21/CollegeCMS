<?php
    require_once("connect.php");
    if (isset($_POST["username"])) {
        $username = mysql_real_escape_string($_POST["username"]);
        $password = mysql_real_escape_string($_POST["password"]);
        $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $password = password_hash($password, PASSWORD_DEFAULT, $options);
        $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '" . $username . "';");
		$rows = mysqli_num_rows($query);
		if ($rows < 1) {
			
			$query = mysqli_query($connect, "INSERT INTO `users` VALUES ('" . $username . "', '" . $password . "');");
			
			session_start();
			$_SESSION["username"] = $username;
			header("Location: index.php");
			exit();
		} else {
			header("Location: signin.php");
				exit();
		}
		
		
		
	
    } else {
        header("Location: signin.php");
        exit();
    }
?>
