<?php session_start(); 
	//Kijk of er een leerlingnummer en wachtwoord is ingevoerds
	if( isSet( $_POST['lln'] ) && isSet( $_POST['Wachtwoord'] ) ){
		include ("functies.php"); 
		dbconnect();
		$query = "SELECT * FROM Gebruiker WHERE leerlingNummer = '" . $_POST['lln'] . "' AND wachtwoord = '" . $_POST['Wachtwoord'] . "'"; //Kijk of het leerlingnummer en het wachtwoord in de database staan
		$result = mysql_query( $query );
		echo $result;
		if ( $result ){ 
			$numRows = mysql_num_rows($result); 
			$row = mysql_fetch_array($result);
			if($numRows == 1){ //kijk of wat je gevonden hebt in de database in één rij staat
				$_SESSION['login'] = true; //zet de login op true
				$_SESSION['lln'] = $row['lln']; //zet het leerlingnummer in de rij
				echo 'Hallo' . $_SESSION['user'];
			} else { 
				$_SESSION['login'] = false; //zet de login op false
				$_SESSION['lln'] = ""; //maak de $_SESSION['lln'] leeg
			}
		}
	}
	
	if(isset($_SESSION['login']) && $_SESSION['login'] == true ){
		//je bent ingelogd
		header('Location: home.html');
	} else{ //als er niks is ingevuld, moet de inlogpagina opnieuw te voorschijn komen
		echo 'Je hebt een verkeerd wachtwoord ingevoerd, probeer het opnieuw';
		include( 'Inlogpagina.html' );
	}
?>
