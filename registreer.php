<?php
	//Kijk of het wachtwoord en het controle wachtwoord hetzelfde zijn
	if( $_POST['wachtwoord'] == $_POST['Controle'] ){
		include ("functies.php");
		dbconnect();
		$query = "INSERT INTO Gebruikers(email, wachtwoord) VALUES('".$_POST['email']."','".$_POST['wachtwoord']."')";
		
		$result = mysql_query( $query );
		
		if ($result == false){
			echo "Er is iets fout gegaan:" . mysql_error();
		} else {
			echo "Je bent succesvol geregistreerd"
			echo "<a href='Inlogpagina.html'>Klik hier om in te loggen</a>";
		}
	//Als de twee wachtwoorden niet hetzelfde zijn, moet je terug naar de registreer pagina
	}else{
		echo '<p>Je hebt twee verschillende wachtwoorden ingevoerd. Ga terug en probeer het opnieuw</p>';
		echo "<a href='Registratiepagina.html'>Klik hier om opnieuw te registreren</a>";
	}
	
?>