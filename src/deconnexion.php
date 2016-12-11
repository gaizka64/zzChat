<?php
	
	/* To activate error display during dev */
	ini_set('display_errors', true); 
	ini_set('error_reporting', E_ALL);
	error_reporting(-1);

	session_start();

	$nomUtilisateur = $_SESSION['login'];
	$fichierDesPersonnesOnline = '../db/online';
	$json = json_decode(file_get_contents($fichierDesPersonnesOnline),TRUE);
	$json[$nomUtilisateur] = 0;
	file_put_contents($fichierDesPersonnesOnline, json_encode($json,TRUE));

	setcookie("lastuser", $nomUtilisateur, time()+60*5,'/');
	
	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy(); 

    header("Location: ../index.php");
    exit;
    
?>
