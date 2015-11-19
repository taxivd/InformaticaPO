<?php
function registreerLeerling( $naam, $lln ){
	$query = "INSERT INTO Leerling( naam, leerlingNummer) VALUES('" . $naam . "', " . $leerlingNummer . ");";
}
function registreerDocent( $naam, $afkorting ){
	$query = "INSERT INTO Docent( naam, afkorting) VALUES('" . $naam . "', " . $afkorting . ");";
}

function maakVak(){

}

function kenDocentVakToe( $docent, $vak ){
	
}

function createToets( $periode, $soort, $weeknr, $toetsWeek, $duur, $toetsWijze, $lokaalType, $herkansbaar, $RAP, $DTW, $ED, $opmerking ){

}



//registreerLeerling( 'Bob', 123456 );
?>