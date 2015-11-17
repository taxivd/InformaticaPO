<?php session_start(); 
	$_SESSION['login'] = false;
	$_SESSION['email'] = "";
	
	echo "<a href='Inlogpagina.html'>Terug naar de home pagina</a>";
?>