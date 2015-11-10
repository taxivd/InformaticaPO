<?php
	session_start(); 
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
			} else { 
				$_SESSION['login'] = false; //zet de login op false
				$_SESSION['email'] = ""; //maak de $_SESSION['email'] leeg
			}
		}
	}else{ //als er niks is ingevuld, moet je terug naar de inlogpagina gaan
		echo "<a href='Inlogpagina.html'>Vul iets in</a>";
	}

	if(isset($_SESSION['login']) && $_SESSION['login'] == true ){
		//je bent ingelogd
		header('Location: home.php');
	} else {
		//je bent niet ingelogd
		header('Location: Inlogpagina.html');
	}
?>
