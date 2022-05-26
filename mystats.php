<?php
	include("dbpwd.php");
	session_start();
	if(!isset($_SESSION['userid'])){
		header("location: home.php");
	}
?>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Rock, Paper, Scissors</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<div id="topbar">
			<a id=logo href="home.php">
				<img src="rpslogo.png"></img>
			</a>
			<?php
				if(isset($_SESSION['username'])){
					echo "<a id=loginbtn href=logout.php>LOGOUT</a>";
				}else{
					echo "<a id=loginbtn href=loginpg.php>LOGIN</a>";
				}
			?>
			
			<?php
				if(isset($_SESSION['username'])){
					echo "<h3 id=uname style=right:14px;>" . $_SESSION['username'] . "</h3>";
				}
			?>
		</div>
	</head>
	<body style=text-align:center;>
		<div id="stattable" style=text-align:center;>
			<h1><?php echo $_SESSION['username'] . "" . "'s stats";?></h1>
			<?php
				$query = sprintf("SELECT wins, losses FROM `users` WHERE userid='%d'", $db->real_escape_string($_SESSION['userid']));
				$statement = $db->prepare($query);
				$statement->execute();
				$statement->bind_result($wins, $losses);
				$statement->store_result();
				$statement->fetch();
				echo "<h3>WINS: ".$wins."</h3><br><h3>LOSSES: ".$losses."</h3>";
			?>
		</div>
	</body>
</html> 