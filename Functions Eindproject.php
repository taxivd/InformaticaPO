<?php
function registreerLeerling( $naam, $lln ){
	$query = "INSERT INTO Leerling( naam, leerlingNummer) VALUES('" . $naam . "', " . $leerlingNummer . ");";
}
function registreerDocent( $naam, $afkorting ){
	$query = "INSERT INTO Docent( naam, afkorting) VALUES('" . $naam . "', " . $afkorting . ");";
}

function maakVak( $vakCode, $vakNaam ){
	$query = "INSERT INTO Vak( vakCode, vakNaam) VALUES('" . $vakNaam . "', " . $vakCode . ");";
}

function kenDocentVakToe( $afkorting, $vak ){
	$query = "INSERT INTO VakDocent( afkorting, vak) VALUES('" . $afkorting . "', " . $vak . ");";
}

function maakToets( $periode, $soort, $weeknr, $toetsWeek, $duur, $toetsWijze, $lokaalType, $herkansbaar, $RAP, $DTW, $ED, $opmerking, $hulpmiddelenSchool, $hulpmiddelenThuis, $aanpasbaar, $docent_id ){
	$query = "INSERT INTO Toets( periode, soort, weeknr, toetsWeek, duur, toetsWijze, lokaalType, herkansbaar, RAP, DTW. ED, opmerking, hulpmiddelenSchool, hulpmiddelenThuis, aanpasbaar, docent_id) VALUES('" . $periode . "', " . $soort . ", " . $weeknr . " ," . $toetsWeek . ", " . $duur . " ," . $toetsWijze . ", " . $lokaalType . " ," . $herkansbaar . ", " . $RAP . " ," . $DTW . ", " . $ED . " ," . $opmerking . ", " . $hulpmiddelenSchool . " ," . $hulpmiddelenThuis . ", " . $aanpasbaar . " ," . $docent_id . " );";
}



//registreerLeerling( 'Bob', 123456 );
?>