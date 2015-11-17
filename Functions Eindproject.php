<?php
function registreerLeerling( $naam, $lln ){
	$query = "INSERT INTO Leerling( naam, leerlingNummer) VALUES('" . $naam . "', " . $leerlingNummer . ");";
}
function registreerDocent( $naam, $afkorting ){
	$query = "INSERT INTO Docent( naam, afkorting) VALUES('" . $naam . "', " . $afkorting . ");";
}



//registreerLeerling( 'Bob', 123456 );
?>