<?php
	@session_start();
?>
<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="Login.css" /> <!-- koppeling css bestand -->
	</head>
	<body>
		<div id="titel">
			<p>Programma van Toetsing en Afsluiting</p>
		</div>
		<!-- Het form element met de action en method attributen -->
		<form method="POST" action="login.php"> <!-- als er op de "verwerk" knop wordt gedrukt, ga je naar data.php -->
			<div class="legendHolder">
				<fieldset>
					<legend>Inloggen</legend> <!-- Titel van de website -->
					<ul>
						<li>
							<label class="gbr" for="lln">Gebruikersnaam</label> <!-- eerste invoerveld voor een leerlingnummer of docentcode -->
							<input type="text" id="lln" required name="lln" placeholder="Gebruikersnaam"/>
						</li>
						<li>
							<label class="ww" for="Wachtwoord">Wachtwoord</label> <!-- tweede invoerveld voor een wachtwoord-->
							<input type="password" id="Wachtwoord" required name="Wachtwoord" placeholder="Wachtwoord"/>
						</li>
					</ul>
					<input class="btn" type="submit" value="Login"/> <!-- Knop om door te gaan naar login.php -->
					<a class="btn" href="Registratie.php">Registreer</a> <!-- Als je nog niet geregisteerd bent, moet je hier op drukken -->
				</fieldset>
			</div>
		</form>
	</body>
</html>