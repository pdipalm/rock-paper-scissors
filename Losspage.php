<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Win Page</title>
<link href="project.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div id = "bonelessbones3">
	<h1 id = "wintext"> You Have Lost!</h1>
	<img id = "bonelessbones" alt = "loss" src= "https://www.thecoli.com/media/hold-this-l.17292/full"
 width = "250" height "250">
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
