<!DOCTYPE html>
<html lang="de">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="manifest" href="/manifest.json" type="application/json" >
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/css/darkstyles.css">
	<link rel="stylesheet" href="./assets/css/mobile.css">
	<link rel="shortcut icon" type="image/x-icon" href="./assets/branding/favicon.ico">
	<title>EWvT-Navigator</title>
</head>
<body>
	<center>
	<div class="container">
	
		<h2>EWvT Navigator</h2>
		
		<form action="rooms.php" method="get">
		   <input type="search" id="searchquery"name="searchquery"  autocomplete="off" value="" placeholder="Raumnummer, Fach, Typ..." required>
		</form>
		
		<!-- Vorschläge -->
		<div class="flexbox">
			<a href="rooms.php?searchquery=052"><div class="box centerbox buttonbox pink button1"><img src="./assets/icons/office.svg" class="icon"><br>Sekretariat</div></a>
			
			<a href="rooms.php?searchquery=005"><div class="box centerbox buttonbox blue button2"><img src="./assets/icons/bibo.svg" class="icon"><br>Bibliothek</div></a>
			
			<a href="rooms.php?searchquery=000"><div class="box centerbox buttonbox yellow button3"><img src="./assets/icons/food.svg" class="icon"><br>Mensa / Aula</div></a>
			<!-- Vorschläge nur auf großen Displays -->
			<a href="rooms.php?searchquery=168"><div class="box centerbox buttonbox overflow green button4"><img src="./assets/icons/lehrer.svg" class="icon"><br>Lehrerzimmer</div></a>

			<a href="rooms.php?searchquery=169"><div class="box centerbox buttonbox overflow red button5"><img src="./assets/icons/arzt.svg" class="icon"><br>Arztzimmer</div></a>
		</div>
		
		
		<!-- Vorschläge nur auf schmalen Displays -->
		<div class="flexbox">
			<a href="rooms.php?searchquery=081"><div class="box centerbox buttonbox green mobileonly button1"><img src="./assets/icons/fctymgr.svg" class="icon"><br>Hausmeister</div></a>
			
			<a href="rooms.php?searchquery=169"><div class="box centerbox buttonbox red mobileonly button2"><img src="./assets/icons/arzt.svg" class="icon"><br>Arztzimmer</div></a>
			
			<a href="rooms.php?searchquery=009"><div class="box centerbox buttonbox orange mobileonly button3"><img src="./assets/icons/sport.svg" class="icon"><br>Sportraum</div></a>
		</div>
		
		<div class="flexbox">
			<a href="rooms.php?searchquery=Vorbereitung"><div class="box centerbox buttonbox button1"><img src="./assets/icons/prepare.svg" class="icon"><br>Vorbereitungs-Zimmer</div></a>
			
			<a href="about.php"><div class="box centerbox buttonbox button2"><img src="./assets/icons/hamburger.svg" class="icon"><br>Mehr</div></a>
		</div>
		
		<div class="flexbox">
			<div class="box">
				<div class="listelement">
					<table><tr><td><img src="./assets/icons/beta.svg" class="icon backdropicon noninvert"></td><td><b>Beta-Status</b><br>Diese Anwendung befindet sich noch in der Entwicklung und es können Fehler auftreten.</td></tr></table>
					
				</div>
				<div class="listelement">
					<a href="feedback.php">
						<table><tr><td>Feedback&nbsp;geben</td><td class="tablewide"><img src="./assets/icons/arrow.svg" class="icon backdropicon"></td></tr></table>
					</a>
				</div>
				<div class="listelement">
					<a href="bugreport.php">
						<table><tr><td>Einen&nbsp;Fehler&nbsp;melden</td><td class="tablewide"><img src="./assets/icons/arrow.svg" class="icon backdropicon"></td></tr></table>
					</a>
				</div>
			</div>
		</div>
		
		<br><br>
		
	</center>
	
</body>
</html>