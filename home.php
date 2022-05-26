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
		
		<script>
		function openTab(cityName) {
			var i;
			var x = document.getElementsByClassName("city");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
				console.log("tab");
			}
			document.getElementById(cityName).style.display = "block";  
		}
		</script>
		
		<div id=content>
			<a id=playbutton href="game.php">PLAY</a>
			<div id=tabmenu style=overflow-y:scroll;>
				<div class="bar">
					<button id="lobbtn" class="w3-bar-item w3-button" onclick="openTab('Lobby')">Lobby</button>
					<button id="lbbtn" class="w3-bar-item w3-button" onclick="openTab('Leaderboard')">Leaderboard</button>
				</div>
				<div id="Lobby" class="lobby-container city">
					<h2>Lobby</h2>
					<p>chat here</p>
				</div>

				<div id="Leaderboard" class="w3-container city" style="display:none;">
					<h2>Leaderboard</h2>
					<table>
						<thead>
							<tr>
								<td>Username</td>
								<td>Wins</td>
								<td>Losses</td>
							</tr>
						</thead>
						<tbody>
						<?php
							$results = $db->query("SELECT username, wins, losses FROM users ORDER BY wins DESC");
							while($row = $results->fetch_array()){
						?>
							<tr>
								<td><?php echo $row['username']?></td>
								<td><?php echo $row['wins']?></td>
								<td><?php echo $row['losses']?></td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>