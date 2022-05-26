<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Win Page</title>
<link href="project.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div id = "bonelessbones2">
	<h1 id = "wintext"> You Win!</h1>
	<img id = "bonelessbones" alt = "trophy" src="https://i.pinimg.com/originals/41/36/16/41361625cc44df07f81a620eac766468.png" width = "250" height "250">
	</div>
	
	<div id=" playagain">
		<button id = "playagain"> PLAY AGAIN</button>
	</div>
	<script>
		document.getElementById('playagain').onclick = function() {playagain()};

		function playagain(){
			window.location.href = "game.php";
		}
	</script>
	</body>
</html>
