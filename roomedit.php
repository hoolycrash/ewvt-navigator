<?php
			$searchQuery = isset($_GET['searchquery']) ? strtolower($_GET['searchquery']) : ''; // Eingabe in Kleinbuchstaben ändern

			$jsonData = file_get_contents('rooms.json');
			$rooms = json_decode($jsonData, true);
			
			$matchingRooms = array();
			
			foreach ($rooms as $room) {
			    $roomLower = array_map('strtolower', $room); // Json Array in Kleinbuchstaben ändern
			    if (
					//Werte der Namen-Wertpaare innerhalb der Objekte werden auf Vorhandensein der Zeichenkette der Nutzer-Eingabe überprüft
			        strpos($roomLower['room'], $searchQuery) !== false ||
			        strpos($roomLower['roomclass'], $searchQuery) !== false ||
			        strpos($roomLower['position'], $searchQuery) !== false ||
			        strpos($roomLower['positioncode'], $searchQuery) !== false ||
			        strpos($roomLower['accesscode'], $searchQuery) !== false ||
			        strpos($roomLower['tags'], $searchQuery) !== false
			    ) {
					//Sammlung aller Übereinstimmungen
			        $matchingRooms[] = $room;
			    }
			}


			
			// Ausgabe der gefundenen Ergebnisse
			if (count($matchingRooms) == 1) {
				$room = $matchingRooms[0];
			} 
			
			$level = ''; 
			
			// Etagencodes aus dem Datensatz in verständliche Wortgruppen umwandeln
			switch ($room['level']) {
			    case -1:
			        $level = 'UG - Untergeschoss';
			        break;
			    case 0:
			        $level = 'EG - Erdgeschoss';
			        break;
			    case 1:
			        $level = '1. OG - Erstes Obergeschoss';
			        break;
			    case 2:
			        $level = '2. OG - Zweites Obergeschoss';
			        break;
			    case 3:
			        $level = 'Dachboden';
			        break;
			    default:
			        $level = 'Unbekanntes Stockwerk';
			        break;
			}
			
			$position = ''; 
			
			// Gebäudeteilcodes aus dem Datensatz in verständliche Wortgruppen umwandeln
			switch ($room['positioncode']) {
			    case 'A':
			        $position = 'Neubau Nordflügel';
			        break;
				case 'B':
			        $position = 'Neubau Nordflügel';
			        break;
				case 'C':
			        $position = 'Neubau Nordflügel';
			        break;
				case 'D':
			        $position = 'Neubau Treppenhalle';
			        break;
				case 'E':
			        $position = 'Neubau Südflügel';
			        break;
				case 'F':
			        $position = 'Neubau Südflügel';
			        break;
				case 'G':
			        $position = 'Mensa';
			        break;
				case 'H':
			        $position = 'Altbau Verbindungsgang';
			        break;
				case 'I':
			        $position = 'Altbau Verbindungsgang';
			        break;
				case 'J':
			        $position = 'Altbau Treppenhalle / Foyer';
			        break;
				case 'K':
			        $position = 'Altbau Ende';
			        break;
				case 'L':
			        $position = 'Altbau Ende';
			        break;
				case 'M':
			        $position = 'Neubau Südflügel';
			        break;

			}
			
			$accesscode = '';
			// Zugangsbeschränkungscodes aus dem Datensatz in verständliche Wortgruppen umwandeln
			switch ($room['accesscode']) {
			    case '1':
			        $accesscode = 'Freier Zugang';
			        break;
			        
			    case '2a':
			        $accesscode = 'Zugang mit Fachlehrer';
			        break;
			        
			    case '2b':
			        $accesscode = 'Hinweise beachten (Öffnungszeiten, Zugangsregelungen etc.)';
			        break;
			        
			    case '3':
			        $accesscode = 'Kein Zutritt';
			        break;
			        
			    case '4':
			        $accesscode = 'Unbekannt';
			        break;
			}
			
			
			
			
?>

<!-- Html Gerüst für das Formular. Die Felder sind mit den aktuellen Daten vorausgefüllt -->
<!DOCTYPE html>
<html lang="de">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/css/darkstyles.css">
	<link rel="stylesheet" href="./assets/css/mobile.css">
	<link rel="shortcut icon" type="image/x-icon" href="./assets/branding/favicon.ico">
	<title>Bug Report | EWvT-Navigator</title>
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
			<h1>Änderung für R-<?php echo($room['room']); ?> vorschlagen</h1>
			<p>Dein Bearbeitungshinsweis hilft uns den Datensatz aktuell zu halten und Fehler zu korrigieren.</p>

			<form method="post" action="mailclient.php">
				<input type="text" id="Raumnummer" name="Raumnummer" placeholder="Raumnummer" value="<?php echo($room['room']); ?>" readonly>
				
				<select name="Roomclass" id="Roomclass" required>
				
					<option value="Neues Label">&#10133; Neues Label</option>
				
					<option value="<?php echo($room['roomclass']); ?>"  selected hidden><?php echo($room['roomclass']); ?></option>
					
					<option value="Arztzimmer">Arztzimmer</option>
					
					<option value="Behindertengerechtes WC">Behindertengerechtes WC</option>
					
					<option value="Bibliothek">Bibliothek</option>
					
					<option value="Biologie">Biologie</option>
					
					<option value="Biologie Vorbereitung">Biologie Vorbereitung</option>
					
					<option value="Cafeteria">Cafeteria</option>
					
					<option value="Chemie">Chemie</option>
					
					<option value="Chemie Vorbereitung">Chemie Vorbereitung</option>
					
					<option value="Fitnessraum">Fitnessraum</option>
					
					<option value="Hausmeister">Hausmeister</option>
					
					<option value="Inklusion I">Inklusion I</option>
					
					<option value="Inklusion II">Inklusion II</option>
					
					<option value="Intern">Intern</option>
					
					<option value="Klassenraum">Klassenraum</option>
					
					<option value="Konferenzraum">Konferenzraum</option>
					
					<option value="Lehrerzimmer">Lehrerzimmer</option>
					
					<option value="Mensa / Aula">Mensa</option>
					
					<option value="Musik">Musik</option>
					
					<option value="Musik Vorbereitung">Musik Vorbereitung</option>
					
					<option value="Schülerküche">Schülerküche</option>
					
					<option value="Sekretariat">Sekretariat</option>
					
					<option value="Technik">Technik</option>
					
					<option value="Technik Vorbereitung">Technik Vorbereitung</option>
					
					<option value="Unbekannt">Unbekannt</option>
					
					<option value="WC Jungen">WC Jungen</option>
					
					<option value="WC Jungen Vorraum">WC Jungen Vorraum</option>
					
					<option value="WC Mädchen">WC Mädchen</option>
					
					<option value="WC Mädchen Vorraum">WC Mädchen Vorraum</option>
					
					<option value="WC Personal">WC Personal</option>
					
				</select>
				
				<input type="text" id="NewLabel" name="NewLabel" placeholder="+ Neues Label (Optional)">
				
				<select name="Building" id="Building" required>
					
					<option value="<?php echo($room['building']); ?>"  selected hidden><?php echo($room['building']); ?></option>
					
					<option value="Neubau">Neubau</option>
					
					<option value="Altbau">Altbau</option>
					
				</select>
				
				<select name="Level" id="Level" required>
					
					<option value="<?php echo($level); ?>"  selected hidden><?php echo($level); ?></option>
					
					<option value="Nordflügel">UG - Untergeschoss</option>
					
					<option value="EG - Erdgeschoss">EG - Erdgeschoss</option>
					
					<option value="1. OG - Erstes Obergeschoss">1. OG - Erstes Obergeschoss</option>
					
					<option value="2. OG - Zweites Obergeschoss">2. OG - Zweites Obergeschoss</option>
					
				</select>
				
				<select name="Location" id="Location" required>
					
					<option value="<?php echo($position); ?>"  selected hidden><?php echo($position); ?></option>
					
					<option value="Altbau hinten">Altbau Hinten</option>
					
					<option value="Altbau Treppenhalle / Foyer">Altbau Treppenhalle / Foyer</option>
					
					<option value="Altbau Verbindungsgang">Altbau Verbindungsgang</option>
					
					<option value="Neubau Nordflügel">Neubau Nordflügel</option>
					
					<option value="Neubau Südflügel">Neubau Südflügel</option>			
					
					<option value="Neubau Treppenhalle">Neubau Treppenhalle</option>
					
					<option value="Mensa">Mensa</option>
					
				</select>
				
				<select name="Accesscode" id="Accesscode" required>
					
					<option value="<?php echo($accesscode); ?>"  selected hidden><?php echo($accesscode); ?></option>
					
					<option value="Freier Zugang">Freier Zugang</option>
					
					<option value="Zugang mit Fachlehrer">Zugang mit Fachlehrer</option>
					
					<option value="Hinweise beachten (Öffnungszeiten, Zugangsregelungen etc.)">Hinweise beachten (Öffnungszeiten, Zugangsregelungen etc.)</option>
					
					<option value="Kein Zutritt">Kein Zutritt</option>
					
					<option value="Unbekannt">Unbekannt</option>
					
				</select>
				
				<textarea id="Nachricht" name="Nachricht" rows="10" cols="50" placeholder="Weitere Details hinzufügen (Optional)"></textarea>

				
				<br><br>
								 
				<button type="submit" name="submit" class="send primary">Absenden</button>
				
				<button type="reset" name="reset" class="reset">Formular leeren</button>
			</form>
			
			<a href="javascript:history.back()"><button class="cancel">Verwerfen</button></a>
			
			<br><br><br>
		</div>
		
	</center>
	
</body>
</html>