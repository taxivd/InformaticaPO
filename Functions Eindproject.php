<?php
function registreerLeerling( $naam, $leerlingNummer ){
	$query = "INSERT INTO Leerling( leerlingNummer, naam, profiel_profiel, toets_id, wachtwoord) VALUES('" . $leerlingNummer . "', " . $naam . ", " . $profiel_profiel . ", " . $toets_id . ", " . $wachtwoord . ");";
	
	
}
function registreerDocent( $afkorting, $naam, $wachtwoord, $docentRol ){
	$query = "INSERT INTO Docent( afkorting, naam) VALUES('" . $afkorting . "', " . $naam . ", " . $wachtwoord . ", " . $docentRol . ");";
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

function registreerBeheerder( $naam, $wachtwoord ){
	$query = "INSERT INTO Beheerder( afkorting, vak) VALUES('" . $afkorting . "', " . $vak . ");";
}

function registreerCommissaris( $afkorting, $vak ){
	$query = "INSERT INTO Commissaris( afkorting, vak) VALUES('" . $afkorting . "', " . $vak . ");";
}

function maakProfiel( $profiel ){
	$query = "INSERT INTO Profiel( profiel ) VALUE('" . $profiel . "');";
}


//registreerLeerling( 'Bob', 123456 );
?>