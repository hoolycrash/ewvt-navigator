<!DOCTYPE html>
<html lang="de">
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="./assets/css/styles.css">
		<link rel="stylesheet" href="./assets/css/darkstyles.css">
		<link rel="stylesheet" href="./assets/css/mobile.css">
		<link rel="shortcut icon" type="image/x-icon" href="./assets/branding/favicon.ico">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
		<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
		<title>SUCHE | EWvT-Navigator</title>
	</head>
<body>

<center>
		<div class="container">
		
			<a href="index.php">
				<h2>EWvT Navigator</h2>
			</a>
			
			<form action="rooms.php" method="get">
			   <input type="search" id="searchquery" name="searchquery"  autocomplete="off" value="<?php echo($_GET['searchquery']); ?>" placeholder="Raumnummer, Fach, Typ..." required>
			</form>
		
<?php
			$searchQuery = strtolower($_GET['searchquery']);

			$jsonData = file_get_contents('rooms.json');
			$rooms = json_decode($jsonData, true);

			  foreach ($rooms as $room) {
			    $roomLower = array_map('strtolower', $room); // Convert all values to lowercase
			    if (
			        strpos($roomLower['room'], $searchQuery) !== false ||
			        strpos($roomLower['roomclass'], $searchQuery) !== false ||
					strpos($roomLower['classcode'], $searchQuery) !== false ||
			        strpos($roomLower['position'], $searchQuery) !== false ||
			        strpos($roomLower['positioncode'], $searchQuery) !== false ||
			        strpos($roomLower['accesscode'], $searchQuery) !== false ||
			        strpos($roomLower['tags'], $searchQuery) !== false
			    ) {
			        $matchingRooms[] = $room;
			    }
			}
					
			// Ausgabe der gefundenen Ergebnisse
			if (count($matchingRooms) == 1) {
				$room = $matchingRooms[0];
			
			
			// Umwandlung Dings	
			$level = ''; 

			switch ($room['level']) {
			    case -1:
			        $level = 'Untergeschoss';
			        break;
			    case 0:
			        $level = 'Erdgeschoss';
			        break;
			    case 1:
			        $level = '1. OG';
			        break;
			    case 2:
			        $level = '2. OG';
			        break;
			    case 3:
			        $level = 'Dachboden';
			        break;
			    default:
			        $level = 'Unbekanntes Stockwerk';
			        break;
			
			}
			
			

			    //DAtenausgabe
				 echo '
			<div class="flexbox">
				<div class="box centerbox ' . $room['classcode'] . '"><img src="./assets/icons/' . $room['classcode'] . '.svg" class="bigicon"><br>' . $room['roomclass'] . '</div>
				
				<div class="box centerbox"><h1>' . $room['room'] . '</h1></div>
			</div>
		
			<div id="map" class="map"></div>
		
			<div class="flexbox">
				<div class="box centerbox"><img src="./assets/icons/' . $room['building'] . '.png" class="bigicon noninvert"><br>' . $room['building'] . '</div>
				
				<div class="box centerbox"><img src="./assets/icons/floor.svg" class="bigicon"><br>' . $level . '</div>
			</div>
			
			<div class="flexbox">
				<div class="box">
					<div class="listelement">
						<table><tr><td><img src="./assets/icons/location.svg" class="icon"></td><td><b>Position</b><br>' . $room['position'] . '</td></tr></table>
					</div>
				
			
			';
				
				
			//Accescodes
			
			if ($room['accesscode'] == 1) {
			  echo '
					<div class="listelement">
						<table><tr><td><img src="./assets/icons/acces1.svg" class="icon"></td><td><b>Freier Zugang</b><br>Dieser Raum steht f&uuml;r alle Sch&uuml;ler offen und kann ohne Aufsicht oder Zustimmung einer Lehrperson betreten werden.</td></tr></table>
					</div>
			  ';
			} else if ($room['accesscode'] == '2a') {
			  echo '
					<div class="listelement">
						<table><tr><td><img src="./assets/icons/access2a.svg" class="icon"></td><td><b>Zugang mit Fachlehrer</b><br>Dieser Raum darf nur nach Aufforderung und mit Aufsicht einer Lehrperson betreten werden.</td></tr></table>
					</div>
			  ';
			} else if ($room['accesscode'] == '2b') {
			  echo '
					<div class="listelement">
						<table><tr><td><img src="./assets/icons/access2b.svg" class="icon"></td><td><b>Hinweise beachten</b><br>Für diesen Raum gelten Zugangsbeschränkungen wie z.B. Öffnungszeiten.</td></tr></table>
					</div>
			  ';
			} else if ($room['accesscode'] == 3) {
			  echo '
					<div class="listelement">
						<table><tr><td><img src="./assets/icons/access3.svg" class="icon"></td><td><b>Kein Zutritt</b><br>Unbefugten ist der Zutritt verboten.</td></tr></table>
					</div>
			  ';
			}
			
			
			
			//Downwidgets
			
			include 'bottomwidgets.php';

			
			echo '
			
			
					<div class="listelement">
						<table>
							<tr>
								<td>
									<img src="./assets/icons/dev.svg" class="icon">
								</td>
								<td>
									<details>
										<summary><b>Dev Panel</b></summary><br>
											Room <code>' . $room['room'] . '</code><hr>
											Roomclass <code>' . $room['roomclass'] . '</code><hr>
											Classcode <code>' . $room['classcode'] . '</code><hr>
											Position <code>' . $room['position'] . '</code><hr>
											Positioncode <code>' . $room['positioncode'] . '</code><hr>
											Accesscode <code>' . $room['accesscode'] . '</code><hr>
											Info <code>' . $room['info'] . '</code><hr>
											Tags <code>' . $room['tags'] . '</code><hr>
											Building <code>' . $room['building'] . '</code><hr>
											Level <code>' . $room['level'] . '</code><hr>
									</details>
								</td>
							</tr>
						</table>
					</div>
			
						<div class="listelement">
							<a href="qr.php?searchquery=' . $room['room'] . '">
								<table><tr><td><img src="./assets/icons/qr.svg" class="icon backdropicon"></td><td><b>QR-Code abrufen</b></td></tr></table>
							</a>
						</div>
						
						<div class="listelement">
							<a href="roomedit.php?searchquery=' . $room['room'] . '">
								<table><tr><td><img src="./assets/icons/edit.svg" class="icon backdropicon"></td><td><b>Änderungen vorschlagen</b></td></tr></table>
							</a>
						</div>
					</div>
				</div>
			

			
			';
			    echo '';
			} elseif (count($matchingRooms) > 1) {
			    // Wenn mehrere Ergebnisse gefunden wurden, gib Links aus
				echo '
			<div class="flexbox">
				<div class="box">
				';
				
			    foreach ($matchingRooms as $room) {
			        echo '
			
				
					<div class="listelement">
						<a href="rooms.php?searchquery=' . $room['room'] . '">
							<table><tr><td><span class="' . $room['classcode'] . ' indicator">&nbsp;&nbsp;</span></span></td><td><b>' . $room['room'] . '</b></td><td class="tablewide">' . $room['roomclass'] . '</td><td><img src="./assets/icons/arrow.svg" class="icon backdropicon"></td></tr></table>
						</a>
					</div>	
				
			
			';
				}
				
			echo '
				</div>
			</div>
				';
			    
			} else {
			    // Wenn keine Übereinstimmungen gefunden wurden
			    echo '
			<div class="text">
				<br>
				<img src="./assets/icons/no_result.svg" class="graphic">
				<h1>Sorry</h1>
				<p>Wir haben f&uuml;r den Suchbegriff keinen Raum in unserer Datenbank gefunden.<p>
				<p><i>Überprüfe deine Sucheingabe</i></p>
				<a href="bugreport.php"><button class="bug">Fehler melden</button></a>
			</div>
				';
				include 'bottomwidgets.php';
			}
			
			
			
			include 'mapview.php';
			
			
			
			?>
	
			
		</div>
		</center>
	</body>
</html>
	



		

			

			
