<?php
	session_start();

	$nomUtilisateur = $_SESSION['login'];
	$fichierDesPersonnesOnline = "../db/online";
	$json  = json_decode(file_get_contents($fichierDesPersonnesOnline),TRUE);
	$json[$nomUtilisateur] = 0;
	file_put_contents($fichierDesPersonnesOnline, json_encode($json,TRUE));

	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy(); 


    header('Location: ../index.php');
    exit;
    
?>