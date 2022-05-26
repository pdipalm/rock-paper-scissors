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
			<?php
				include("dbpwd.php");
				session_start();
				if(isset($_SESSION['username'])){
					echo "<a id=loginbtn href=logout.php>LOGOUT</a>";
				}else{
					echo "<a id=loginbtn href=loginpg.php>LOGIN</a>";
				}
			?>
			
			<?php
				if(isset($_SESSION['username'])){
					echo "<h3 id=uname>" . $_SESSION['username'] . "</h3>";
					echo "<a id=statbtn href=mystats.php>STATS</a>"; 
				}
			?>
		</div>
	</header>
	<body style=text-align:center;>
		<div class= "game">
			<button id = "rock"><img id="gamebtn" src="rock.png" alt="rock" >
			</button>
			<button id = "paper"><img id="gamebtn" src="paper.png" alt="paper" >
			</button>
			<button onClick id = "scissors"> <img id="gamebtn" src="scissors.png" alt="scissors" >	
			</button>
		</div>

<!-- GAME CODE -->
<script> 

	var temp;
	var computerchoice = Math.random();
	var userchoice = 0; 
	
	//1 = rock 2- scissors 3 = paper
	if (computerchoice < 0.34) {
	
		computerchoice = 1;
	
	} else if (computerchoice <= 0.67) {
	
		computerchoice = 2;
	
	} else {
	
		computerchoice = 3;
	
	}
	
	//1 = rock 2 = scissors 3 = papers
	document.getElementById('scissors').onclick = function () {scissors()};
	document.getElementById('rock').onclick = function () {rock()};
	document.getElementById('paper').onclick = function () {paper()};
	
function scissors ()
{ 
var userchoice2 = 2;
		if (userchoice2 == computerchoice) {
			window.location.href = "Tiepage.html";

	} else if (computerchoice == 1) {
				window.location.href = "Losspage.php"
	} else if (computerchoice == 3) {
				window.location.href = "Winpage.php"

	}


}

function rock ()
{ 
var userchoice1 = 1;
		if (userchoice1 == computerchoice) {
			window.location.href = "Tiepage.html";


	} else if (computerchoice == 3) {
				window.location.href = "Losspage.php"
	} else if (computerchoice == 2) {
				window.location.href = "Winpage.php";

	}
}

function paper ()
{ 
var userchoice3 = 3;
		if (userchoice3 == computerchoice) {
			window.location.href = "Tiepage.html";

	} else if (computerchoice == 2) {
				window.location.href = "Losspage.php"
	} else if (computerchoice == 1) {
			window.location.href = "Winpage.php";

	}
}


</script>

	</body>
</html>