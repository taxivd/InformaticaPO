<?php session_start(); 
	$_SESSION['login'] = false;
	$_SESSION['voornaam'] = "";
	$_SESSION['achternaam'] = "";
	$_SESSION['email'] = "";
	
	echo "<a href='Inlogpagina.html'>Terug naar de home pagina</a>";
?>