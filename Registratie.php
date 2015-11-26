<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="Registreer.css" /> <!-- koppeling css bestand -->
	</head>
	<body>
		<div id="titel">
			<p>Programma van Toetsing en Afsluiting</p>
		</div>
		<!-- Het form element met de action en method attributen -->
		<form method="post" action="registreer.php"> <!-- als er op de "verwerk" knop wordt gedrukt, ga je naar data.php -->
			<div><? if( isSet( $_GET['message'] ) ){ echo $_GET['message']; } ?></div>
			<div class="Holder">
				<fieldset>
					<legend>Registreren</legend> <!-- Titel van de website -->
					<ul>
						<li>
							<label class="gbr" for="lln">Leerlingnummer</label> <!-- eerste invoerveld -->
							<input type="number" id="lln" required name="lln" min="100000" max="999999" placeholder="Leerlingnummer"/>
						</li>
						<li>
							<label class="ww" for="Wachtwoord">Wachtwoord</label> <!-- tweede invoerveld -->
							<input type="password" id="Wachtwoord" required name="Wachtwoord" placeholder="Wachtwoord"/>
						</li>
						<li>
							<label for="Controle">Herhaal uw wachtwoord</label> <!-- tweede invoerveld -->
							<input type="password" id="Controle" required name="Controle" placeholder="Wachtwoord"/>
						</li>
					</ul>
					<input class="btn" type="submit" value="Registreer"/> <!-- Knop om door te gaan naar de volgende website -->
				</fieldset>
			</div>
		</form>
	</body>
</html>