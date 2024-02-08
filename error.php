<!DOCTYPE html>
<html lang="de">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/css/darkstyles.css">
	<link rel="stylesheet" href="./assets/css/mobile.css">
	<link rel="shortcut icon" type="image/x-icon" href="./assets/branding/favicon.ico">
	<title>EWvT-Navigator</title>
</head>
<body>
	<center>
	<div class="container">
	
		<a href="index.php">
			<h2>EWvT Navigator</h2>
		</a>
		
		<form action="rooms.php" method="get">
		   <input type="search" id="searchquery"name="searchquery"  autocomplete="off" value="" placeholder="Raumnummer, Fach, Typ..." required>
		</form>
		
		<div class="text">
			<br>
			<img src="./assets/graphics/fuck.png" class="pixelgraphic">
			<h1>Da hat etwas nicht geklappt.</h1>
			<p>Beim Sendevorgang ist ein Fehler aufgetreten.<p>
			<a href="javascript:history.back()"><button class="back">Zurück</button></a>
			<a href="index.php"><button class="home">Zur Startseite</button></a>
		</div>
		
	</center>
	
</body>
</html>