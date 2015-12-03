<?php
require_once "Rollen.php";
require_once "rollen2.php";

include ("functies.php"); //maak verbinding met de database
dbconnect();

session_start();

if (isset($_SESSION["loggedin"])) {
    $u = PrivilegedUser::getByUsername($_SESSION["loggedin"]);
}

if ($u->hasPrivilege("thisPermission")) {
    // do something
}