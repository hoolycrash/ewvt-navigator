<!DOCTYPE html>
<html lang="de">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/css/darkstyles.css">
	<link rel="stylesheet" href="./assets/css/mobile.css">
	<link rel="shortcut icon" type="image/x-icon" href="./assets/branding/favicon.ico">
	<title>Feedback | EWvT-Navigator</title>
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
			<h1>Feedback</h1>
			<form method="post" action="mailclient.php">
			
				
				<!-- Slider um Zufriedenheit auszuwählen -->
				<table class="tdwide"><tr><td><h1>☹️</h1></td><td class="tdwide"><h3>Wie gef&auml;llt dir Navigator?</h3></td><td><h1>🤩</h1></td></tr></table>
				<input type="range" name="Fav-Score" min="1" max="6" value="2" class="slider">
				
				<br><br>
								 
				<textarea id="Nachricht" name="Nachricht" rows="10" cols="50" placeholder="Was gefällt dir am EWvT-Navigator oder was müssen wir noch verbessern?" required></textarea>
				
				<br>
				 
				<button type="submit" name="submit" class="send primary">Absenden</button>
				
				<button type="reset" name="reset" class="reset">Formular leeren</button>
			</form>
			
			<!-- Leeren des Formular -->
			<a href="javascript:history.back()"><button class="cancel">Verwerfen</button></a>
			
			<br><br><br>
		</div>
		
	</center>
	
</body>
</html>