<?php
		
if ($room['room'] == '000') {
			  echo '
					<div class="listelement">
						<table><tr><td><img src="./assets/icons/clock.svg" class="icon"></td><td><b>Essensausgabe</b><br>T&auml;glich 11:35 - 12:25</td></tr></table>
					</div>
			  ';
			} 
			
if ($room['room'] == '005') {
			  echo '
					<div class="listelement">
						<table><tr><td><img src="./assets/icons/clock.svg" class="icon"></td><td><b>&Ouml;ffnungszeiten</b><br>Montag: 12:00 - 14:00</td></tr></table>
					</div>
			  ';
			} 
			
if ($room['room'] == '009') {
			  echo '
					<div class="listelement">
						<table><tr><td><img src="./assets/icons/info.svg" class="icon"></td><td><b>Anmeldung erforderlich</b><br>Die Benutzung des Fitnessraumes unterliegt der vorherigen Absprache mit den Fachlehrern Sport.</td></tr></table>
					</div>
			  ';
			} 

if ($searchQuery == 'tictactoe') {
    include 'easteregg.php';
}

?>