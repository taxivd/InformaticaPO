<?php
	//Kijk of het wachtwoord en het controle wachtwoord hetzelfde zijn
	if( $_POST['wachtwoord'] == $_POST['Controle']){
		include ("functies.php"); //maak verbinding met de database
		dbconnect();
		
		$query = "INSERT INTO Gebruiker(leerlingnummer, wachtwoord) VALUES('". $_POST['lln'] ."','".$_POST['wachtwoord']."')"; //zet het leerlingnummer en het wachtwoord in de database
		
		$result = mysql_query( $query );
		
		if ($result == false){ //als er een fout wordt gemaakt, kan je terug gaan naar de registratiepagina
			echo "Er is iets fout gegaan:" . mysql_error();
			echo "<a href='Registratie.html'>Klik hier om opnieuw te registreren</a>";
		} else {
			echo "Je bent succesvol geregistreerd";
			echo "<a href='Inlogpagina.html'>Klik hier om in te loggen</a>";
		}
	//Als de twee wachtwoorden niet hetzelfde zijn, moet je terug naar de registreer pagina
	}else{
		echo '<p>Je hebt twee verschillende wachtwoorden ingevoerd. Ga terug en probeer het opnieuw</p>';
		echo "<a href='Registratie.html'>Klik hier om opnieuw te registreren</a>";
	}
	
?>