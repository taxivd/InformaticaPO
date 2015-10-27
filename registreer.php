<?php
	if( $_POST['Wachtwoord'] == $_POST['Controle'] ){
		include ("functies.php");
		dbconnect();
		$query = "INSERT INTO Gebruikers(email, wachtwoord) VALUES('".$_POST['Gebrnaam']."','".$_POST['Wachtwoord']."')";
		
		$result = mysql_query( $query );
		
		if ($result == false){
			echo "Er is iets fout gegaan:" . mysql_error();
		} else {
			echo "Je bent succesvol geregistreerd"
		}
	}else{
		echo '<p>Je hebt twee verschillende wachtwoorden ingevoerd. Ga terug en probeer het opnieuw</p>';
	}
	echo "<a href='Registratiepagina.html'>Terug naar het formulier</a>";
?>