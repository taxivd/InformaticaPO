<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="pta.css" /> <!-- koppeling css bestand -->
	</head>
	<body>
		<div id="titel">
			<p>Programma van Toetsing en Afsluiting</p>
		</div>
			
		<form method="POST" action="logout.php"> <!-- als er op de "verwerk" knop wordt gedrukt, ga je naar data.php -->											
			<input class="btn" type="submit" value="Uitloggen"/> <!-- Knop om door te gaan naar login.php -->		
		</form>
		<?php
			function PTAVoorbeeld(){
				include('Functions Eindproject.php');
				if( $vakken = vindVakkenVanLeerling( 'code' ) ){
				foreach( $vakken as $vak ){
					echo "<h1>" . $vak['vakNaam'] . "</h1>";
			
					if( $toetsen = vindToetsenVanVak( $vak['vakCode'] ) ){
						foreach( $toetsen as $toets ){
							echo "<p>" . $toets['duur'] . "</p>";
							}
						}
					}
				}
			}
		
		?>
		
			
	</body>
</html>