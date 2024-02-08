<!DOCTYPE html>
<html lang="de">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/css/darkstyles.css">
	<link rel="stylesheet" href="./assets/css/mobile.css">
	<link rel="shortcut icon" type="image/x-icon" href="./assets/branding/favicon.ico">
	<title>Fehler melden | EWvT-Navigator</title>
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
			<h1>Fehler melden</h1>
			<form method="post" action="mailclient.php">
				<input type="text" id="Email" name="Email" placeholder="E-Mail / LernSax (Empfohlen)">
				
				<!-- Feld mit Auswahlmöglichkeiten in DropDown Liste -->
				<select name="os" id="os" required>
					<option value="" disabled selected hidden>Gerät</option>
					<option value="PC">PC</option>
					<option value="Laptop">Laptop</option>
					<option value="Notebook">Notebook</option>
					<option value="Convertible">Convertible</option>
					<option value="Tablet">Tablet</option>
					<option value="Smartphone">Smartphone</option>
					<option value="Foldable">Foldable</option>
					<option value="Flip">Flip</option>
					<option value="Duo">Duo</option>
					<option value="Samsung Kühlschrank">Samsung Kühlschrank</option>
					<option value="TV">TV</option>
					<option value="Andere">Andere</option>
				</select>
				
				<select name="os" id="os" required>
						<option value="" disabled selected hidden>Betriebsystem</option>
					<optgroup label="Desktopgeräte">
						<option value="Windows 7 / 8 / 8.1">Windows 7 / 8 / 8.1</option>
						<option value="Windows 10 / 11">Windows 10 / 11</option>
						<option value="Windows RT">Windows RT</option>
						<option value="Windows Andere">Windows Andere</option>
						<option value="macOS">macOS</option>
						<option value="macOS">Chrome OS</option>
						<option value="Ubuntu">Linux Ubuntu</option>
						<option value="Debian">Linux Debian</option>
						<option value="openSuse">Linux openSUSE</option>
						<option value="Arch Linux">Linux Arch Linux</option>
						<option value="Linux Andere">Linux Andere</option>
						<option value="Desktop Andere">Andere</option>
					</optgroup>
					<optgroup label="Mobile">
						<option value="Android 8">Android 8 Oreo</option>
						<option value="Android 9">Android 9 Pie</option>
						<option value="Android 10">Android 10</option>
						<option value="Android 11">Android 11</option>
						<option value="Android 12">Android 12</option>
						<option value="Android 13">Android 13</option>
						<option value="Android 14">Android 14</option>
						<option value="Android Andere">Android Andere</option>
						<option value="iOS 14">iOS 14</option>
						<option value="iOS 15">iOS 15</option>
						<option value="iOS 16">iOS 16</option>
						<option value="iOS 17">iOS 17</option>
						<option value="iOS Andere">iOS Andere</option>
						<option value="Mobile Andere">Andere</option>
					</optgroup>
					<optgroup label="Weitere">
						<option value="Android TV">Android TV</option>
						<option value="Amazon FireTV">Amazon FireTV</option>
						<option value="Weitere Andere">Andere</option>
						
					</optgroup>
				</select>
				 
				<input type="text" id="Zusammenfassung" name="Zusammenfassung" placeholder="Zusammenfassung" required>
				 
				<textarea id="Nachricht" name="Nachricht" rows="10" cols="50" placeholder="Beschreibe hier ausf&uuml;hrlich das Problem." required></textarea>
				
				
				<br>
				
				<button type="submit" name="submit" class="send primary">Absenden</button>
				
				<button type="reset" name="reset" class="reset">Formular leeren</button>
			</form>
			
			<a href="javascript:history.back()"><button class="cancel">Verwerfen</button></a>
			
			<br><br><br>
		</div>
		
	</center>
	
</body>
</html>