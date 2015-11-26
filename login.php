<?php session_start(); 
	//Kijk of er een leerlingnummer en wachtwoord is ingevoerd
	if( isSet( $_POST['lln'] ) && isSet( $_POST['wachtwoord'] ) ){
		include ("functies.php"); 
		dbconnect();
		$query = "SELECT * FROM Gebruiker WHERE leerlingnummer = '" . $_POST['lln'] . "' AND wachtwoord = '" . $_POST['wachtwoord'] . "'"; //Kijk of het leerlingnummer en het wachtwoord in de database staan
		$result = mysql_query( $query );
		
		if ($result == true){ 
			$numRows = mysql_num_rows($result); 
			$row = mysql_fetch_array($result);
			if($numRows == 1){ //kijk of wat je gevonden hebt in de database in één rij staat
				$_SESSION['login'] = true; //zet de login op true
				$_SESSION['lln'] = $row['lln']; //zet het leerlingnummer in de rij
				echo 'Hallo' . $_SESSION['user'];
				header('Location: home.html');
				
			} else { 
				$_SESSION['login'] = false; //zet de login op false
				$_SESSION['lln'] = ""; //maak de $_SESSION['lln'] leeg
			}
		}
	}else{ //als er niks is ingevuld, moet de inlogpagina opnieuw te voorschijn komen
		echo 'Er is iets fout gegaan';
	}

	if(isset($_SESSION['login']) && $_SESSION['login'] == true ){
		//je bent ingelogd
		header('Location: home.html');
	} else {
		//je bent niet ingelogd
		header('Location: Inlogpagina.html');
	}
	/*<form method="POST" action="login.php"> <!-- als er op de "verwerk" knop wordt gedrukt, ga je naar data.php -->
			<div class="legendHolder">
				<fieldset>
					<legend>Inloggen</legend> <!-- Titel van de website -->
					<ul>
						<li>
							<label class="gbr" for="lln">Leerlingnummer</label> <!-- eerste invoerveld -->
							<input type="number" id="lln" required name="lln" "min="100000" max="999999" placeholder="Leerlingnummer"/>
						</li>
						<li>
							<label class="ww" for="Wachtwoord">Wachtwoord</label> <!-- tweede invoerveld -->
							<input type="password" id="Wachtwoord" required name="wachtwoord" placeholder="Wachtwoord"/>
						</li>
					</ul>
					<input class="btn" type="submit" value="Login"/> <!-- Knop om door te gaan naar login.php -->
				</fieldset>
			</div>
		</form>
		*/
?>
