<?php session_start(); 
	$_SESSION['login'] = false;
	$_SESSION['lln'] = "";
	
	echo 'Je bent uitgelogd';
	include( 'Inlogpagina.html' ); 
?>