<?php
function dbconnect(){
    include("dbdef.php");
    
    //Maak eerste een connectie met de gegevens van je database beheerder wachtwoord
    $connect = mysql_connect($db_hostname,$db_user,$db_password);
    if ($connect == false){
        die("Verbinding met ". $db_hostname . "is niet gelukt.");
    }
    
    //selecteer daarna de juiste database waarbij je gebruik maakt van de connectie
    $database = mysql_select_db($db_name, $connect);
    if($database == false){
        die("Database" . $db_name . "kan niet geselecteerd worden.");
    } 
    return $database;
}
?>