<?php session_start(); 
	//Kijk of er een leerlingnummer en wachtwoord is ingevoerds
	if( isSet( $_POST['lln'] ) && isSet( $_POST['Wachtwoord'] ) ){
		include ("functies.php"); //maak verbinding met de database
		dbconnect();
		$query = "SELECT * FROM Gebruiker WHERE code = '" . $_POST['lln'] . "' AND wachtwoord = '" . $_POST['Wachtwoord'] . "'"; //Kijk of het leerlingnummer en het wachtwoord in de database staan
		$result = mysql_query( $query );
		if ( $result ){ 
			$numRows = mysql_num_rows($result); 
			$row = mysql_fetch_array($result);
			if($numRows == 1){ //kijk of wat je gevonden hebt in de database in één rij staat
				$_SESSION['login'] = true; //zet de login op true
				$_SESSION['lln'] = $row['lln']; //zet het leerlingnummer in de rij
				$_SESSION['rol'] = $row['rol']; //kijk welke rol er is toegewezen, de beheerder (wij) kunnen de rollen toewijzen in phpmyadmin
					if( $_SESSION['rol'] == 0 ){ //als de rol 0 is, is het een leerling
						echo 'Leerling';
					} else if( $_SESSION['rol'] == 1 ){ //als de rol 1 is, is het een docent
						echo 'Docenten';
					}else if( $_SESSION['rol'] == 2 ){ //als de rol 0 is, is het een beheerder
						echo 'Beheerder';
					}
			} else { 
				$_SESSION['login'] = false; //zet de login op false
				$_SESSION['lln'] = ""; //maak de $_SESSION['lln'] leeg
			}
		}
	}
	
	if(isset($_SESSION['login']) && $_SESSION['login'] == true ){
		//je bent ingelogd
		header('Location: pta.php');
	} else{ //als er niks is ingevuld, moet de inlogpagina opnieuw te voorschijn komen
		echo 'Je hebt een verkeerd wachtwoord ingevoerd, probeer het opnieuw';
		include( 'Inlogpagina.html' );
	}
?>
