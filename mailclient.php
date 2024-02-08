<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Überprüfen, ob Eingabe vorhanden
	if (!empty($_POST)) {
		// Email des Bearbeiters
		$zielEmail = "felix-nietzold@outlook.de";

		// Btreff
		$betreff = "Formular-Daten von EWvT-Navigator";

		// Nachricht mit den erhaltenen Daten
		$nachrichtInhalt = "Folgende Daten wurden gesendet:\n\n";

		// Alle Variablen in Text ausgeben
		foreach ($_POST as $key => $value) {
			$nachrichtInhalt .= "$key: $value\n";
		}

		// Email-Header
		$header = "From: feedback@ewvtnavigator.com"; // Hier die Absender-E-Mail-Adresse eintragen

		// Email senden
		mail($zielEmail, $betreff, $nachrichtInhalt, $header);
        
		// Bestätigungsseite
		echo "<html><head><meta http-equiv=\"refresh\" content=\"0; URL=success.php\"></head></html>";
	} else {
		// Fehlermeldung wenn keine übergebenen Variablen
		echo "<html><head><meta http-equiv=\"refresh\" content=\"0; URL=error.php\"></head></html>";
	}
}
?>