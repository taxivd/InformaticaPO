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
							<label class="gbr" for="lln">Gebruikersnaam</label> <!-- eerste invoerveld voor een leerlingnummer of docentcode-->
							<input type="text" id="lln" required name="lln" placeholder="Gebruikersnaam"/>
						</li>
						<li>
							<label class="ww" for="Wachtwoord">Wachtwoord</label> <!-- tweede invoerveld voor een wachtwoord-->
							<input type="password" id="Wachtwoord" required name="Wachtwoord" placeholder="Wachtwoord"/>
						</li>
						<li>
							<label for="Controle">Herhaal uw wachtwoord</label> <!-- derde invoerveld voor het controle wachtwoord -->
							<input type="password" id="Controle" required name="Controle" placeholder="Wachtwoord"/>
						</li>
						<li>
							<p>Kies hieronder uw vakkenpakket</p>
							<?php
								include('Functions Eindproject.php');
								if( $vakken = vindVakken( ) ){
								foreach( $vakken as $vak ){
									echo '<input type="checkbox" name="vak_'. $vak['vakCode'] .'" id="'. $vak['vakCode'] .'" value="'. $vak['vakCode'] .'"/><label for="'. $vak['vakCode'] .'">' . $vak['vakNaam'] . "</label><br />";
								}
								}
							?>
						</li>
					</ul>
					<input class="btn" type="submit" value="Registreer"/> <!-- Knop om door te gaan naar de inlogpagina website -->
				</fieldset>
			</div>
		</form>
	</body>
</html>