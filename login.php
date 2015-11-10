<?php
	session_start(); 
	//Kijk of er een email en wachtwoord is ingevoerd
	if( isSet( $_POST['email'] ) && isSet( $_POST['wachtwoord'] ) ){
		include ("functies.php"); 
		dbconnect();
		$mail = strtolower( $_POST['email'] );
		$query = "SELECT * FROM Gebruikers WHERE email = '" . $mail . "' AND wachtwoord = '" . $_POST['wachtwoord'] . "'"; //Kijk of de email en het wachtwoord in de database staan
		$result = mysql_query( $query );
		
		if ($result == true){ 
			$numRows = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			if($numRows == 1){
				$_SESSION['login'] = true;
				$_SESSION['email'] = $row['email'];
			} else { 
				$_SESSION['login'] = false;
				$_SESSION['email'] = "";
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
