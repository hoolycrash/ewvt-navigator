<!DOCTYPE html>
<html lang="de">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/css/darkstyles.css">
	<link rel="stylesheet" href="./assets/css/mobile.css">
	<link rel="shortcut icon" type="image/x-icon" href="./assets/branding/favicon.ico">
	<title>QR-Code abrufen EWvT-Navigator</title>
</head>
<body>
	<center>
	<div class="container">
	
		<a href="index.php">
			<h2>EWvT Navigator</h2>
		</a>
		
		<!-- Suchfeld -->
		<form action="rooms.php" method="get">
		   <input type="search" id="searchquery"name="searchquery"  autocomplete="off" value="" placeholder="Raumnummer, Fach, Typ..." required>
		</form>
		
		<div class="text">
			<br>
			<h1>QR-Code für R-<?php echo($_GET['searchquery']); ?> abrufen.</h1>
			<p>Der generierte QR-Code leitet direkt zum gewählten Raum.<p>
			<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script><!-- Externes Skript zum Rendern der Grafik -->
			<div id="qrcode"></div><!-- Container zum Rendern der Grafik -->
			
			<script type="text/javascript">
				var qrcode = new QRCode(document.getElementById("qrcode"), {
					text: "https://canary-ewvt-navigator.de.cool/rooms.php?searchquery=<?php echo($_GET['searchquery']); ?>",
					width: 170,
					height: 170,
					colorDark : "#000000",
					colorLight : "#ffffff",
					correctLevel : QRCode.CorrectLevel.H
				});
			</script>
		</div>
		
	</center>
	
</body>
</html>