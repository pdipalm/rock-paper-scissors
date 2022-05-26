<?php
include("dbpwd.php");

$mesg = "Create account";

if(true){
	if(isset($_POST['username'])){
		$db->autocommit(FALSE);
		$hash = hash("sha256", $_POST['password']);

		$sql = sprintf("
		INSERT INTO users (username,password)
		VALUES ('%s','%s') 
		",$db->real_escape_string($_POST['username']),$db->real_escape_string($hash));
		if(strlen($_POST['username']) <= 16){
			if($_POST['password'] != $_POST['cpassword']){
				$mesg = "passwords do not match";
				$db->rollback();
			}else{
				if ( $db->query($sql) ) {
					$sql = sprintf("
					INSERT INTO users (username,password)
					VALUES ('%s','%s') 
					",$db->real_escape_string($_POST['username']),$db->real_escape_string($hash));
					$db->commit();
					header('location: loginpg.php');
				} else {
					outputDBError($db);
					$db->rollback(); //ROLLBACK transaction
				}
				$db->close();
			}
		}else{
			$mesg = "username may only be up to 16 characters";
			$db->rollback();
		}
	} else {
		$_POST['username'] = "";
		$_POST['password'] = "";
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
	
	<body style=text-align:center;>
		<div id="topbar">
			<a id=logo href="home.php">
				<img src="rpslogo.png"></img>
			</a>
		</div>
		<div id="newaccountform">
			<h1><?php echo $mesg; ?></h1>
			<form method="post">
				Username:<br>
				<input type="text" name="username"><br>
				Password:<br>
				<input type="password" name="password"><br>
				Confirm Password:<br>
				<input type="password" name="cpassword"><br>
				<input type="submit" name="submit">
			</form>
		</div>
	</body>
</html>