<?php

require_once("dbpwd.php"); //Creates a $db mysqli object and connects to DB
session_start();
$msg = "Login";
if ( isset($_SESSION['username']) && isset($_SESSION['userid'])) {
	//already logged in
	header("location: home.php");
} elseif ( isset($_POST['userid']) && isset($_POST['password'])) {
	$sql = sprintf("
		SELECT username,userid
		FROM users
		WHERE username='%s' AND password=SHA2('%s',256)
	",$db->real_escape_string($_POST['userid']),$db->real_escape_string($_POST['password']));
	
	if ( $result = $db->query($sql) ) {
	
		if ($result && $result->num_rows == 1 ) {
			$u = $result->fetch_assoc();
			$_SESSION['username'] = $u['username'];
			$_SESSION['userid'] = $u['userid'];
			
			//Update users status
			$db->query("UPDATE users SET status=1 WHERE username = '". $u['username']  ."'");
			
			header("location: home.php");
		} else {
			$msg = "Incorrect userid and/or password.";
		}
	} else {
		outputDBError($db);
	}
}
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Rock, Paper, Scissors</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<header>
		<div id="topbar">
			<a id=logo href="home.php">
				<img src="rpslogo.png"></img>
			</a>
		</div>
	</header>
	<body style=text-align:center;>
		<div id="accountform">
			<h1><?php echo $msg; ?></h1>
			<form method="post">
				Username:<br>
				<input type="text" name="userid" value=""><br>
				Password:<br>
				<input type="password" name="password" value=""><br>
				<br>
				<input type="submit" value="login">
			</form>
			<br>
			<a href="createacct.php">Create an account</a>
		</div>
	</body>
</html>
