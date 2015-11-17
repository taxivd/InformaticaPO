<?php session_start(); 
	//Kijk of er een email en wachtwoord is ingevoerd
	if( isSet( $_POST['email'] ) && isSet( $_POST['wachtwoord'] ) ){
		include ("functies.php"); 
		dbconnect();
		$mail = strtolower( $_POST['email'] ); //zet alle letters in de email om naar kleine letters
		$query = "SELECT * FROM Gebruikers WHERE email = '" . $mail . "' AND wachtwoord = '" . $_POST['wachtwoord'] . "'"; //Kijk of de email en het wachtwoord in de database staan
		$result = mysql_query( $query );
		
		if ($result == true){ 
			$numRows = mysql_num_rows($result); 
			$row = mysql_fetch_array($result);
			if($numRows == 1){ //kijk of wat je gevonden hebt in de database in één rij staat
				$_SESSION['login'] = true; //zet de login op true
				$_SESSION['email'] = $row['email']; //zet het email in de rij
				echo 'Hallo' . $_SESSION['user'];
			} else { 
				$_SESSION['login'] = false; //zet de login op false
				$_SESSION['email'] = ""; //maak de $_SESSION['email'] leeg
			}
		}
	}else{ //als er niks is ingevuld, moet de inlogpagina opnieuw te voorschijn komen
		?>
		<form method="POST" action="login.php"> <!-- als er op de "verwerk" knop wordt gedrukt, ga je naar data.php -->
			<fieldset>
				<legend>Inlog pagina</legend> <!-- Titel van de website -->
				<ol>
					<li>
						<label for="email">Email:</label> <!-- eerste invoerveld -->
						<input type="text" id="email" required placeholder="Emailadres"/>
					</li>
					<li>
						<label for="wachtwoord">Wachtwoord:</label> <!-- tweede invoerveld -->
						<input type="password" id="wachtwoord" required placeholder="Wachtwoord"/>
					</li>
				</ol>
				<input class="knop" type="submit" value="Login"/> <!-- Knop om door te gaan naar login.php -->
		</form>
		<?php
	}

	if(isset($_SESSION['login']) && $_SESSION['login'] == true ){
		//je bent ingelogd
		header('Location: home.php');
	} else {
		//je bent niet ingelogd
		header('Location: Inlogpagina.html');
	}
?>
