<?php
	//Kijk of het wachtwoord en het controle wachtwoord hetzelfde zijn
	if( $_POST['Wachtwoord'] == $_POST['Controle']){
	
		$vakken = array();
		foreach( $_POST as $key => $value ){
			if( isSet( $key[4] ) && substr( $key, 0, 4 ) == 'vak_' ){
				$vakken[] = substr( $key, 4 ) ;
			}
		}
		
		include ("functies.php"); //maak verbinding met de database
		dbconnect();
		
		$query = "INSERT INTO Gebruiker(code, wachtwoord) VALUES('". $_POST['lln'] ."','".$_POST['Wachtwoord']."')"; //zet het leerlingnummer en het wachtwoord in de database
		
		$result = mysql_query( $query );
		
		if ($result == false){ //als er een fout wordt gemaakt, kan je terug gaan naar de registratiepagina
			echo "Er is iets fout gegaan:" . mysql_error();
			header('Location: Registratie.php');
		} else {
			foreach( $vakken as $vak ){
				$klaas = "INSERT INTO VakGebruiker(vakCode, gebruikerCode) VALUES('". $vak . "', '". $_POST['lln'] . "')"; 
				$piet = mysql_query( $klaas );
		
				if ($piet == false){ //als er een fout wordt gemaakt, kan je terug gaan naar de registratiepagina
					echo "Er is iets fout gegaan:" . mysql_error();
				}
			}
			header('Location: Inlogpagina.html');
			echo 'Je bent succesvol geregistreerd';
		}
	
	//Als de twee wachtwoorden niet hetzelfde zijn, moet je terug naar de registreer pagina
	}else{
		$_GET['message'] = 'Je hebt twee verschillende wachtwoorden ingevoerd.';
		include( 'Registratie.php' );
	}
	
?>