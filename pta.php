<?php
session_start();
?><!doctype html>
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
			include('Functions Eindproject.php');
			if( $vakken = vindVakkenVanLeerling( $_SESSION['lln'] ) ){
				foreach( $vakken as $vak ){
					echo "<h1>" . $vak['vakNaam'] . "</h1>";
			
					if( $toetsen = vindToetsenVanVak( $vak['vakCode'] ) ){
						foreach( $toetsen as $toets ){
							echo "<p>" . $toets['toetsNaam'] . "</p>";
							echo "<p>" . $toets['periode'] . "</p>";
							echo "<p>" . $toets['soort'] . "</p>";
							echo "<p>" . $toets['weeknr'] . "</p>";
							echo "<p>" . $toets['toetsWeek'] . "</p>";
							echo "<p>" . $toets['duur'] . "</p>";
							echo "<p>" . $toets['toetsWijze'] . "</p>";
							echo "<p>" . $toets['lokaalType'] . "</p>";
							echo "<p>" . $toets['herkansbaar'] . "</p>";
							echo "<p>" . $toets['RAP'] . "</p>";
							echo "<p>" . $toets['DTW'] . "</p>";
							echo "<p>" . $toets['ED'] . "</p>";


						}
					}
				}
			}
		?>
	</body>
</html>