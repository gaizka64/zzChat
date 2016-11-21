<?php
	session_start();
	
	// Remove from connected users list
	$fichierDesPersonnesOnline = "../db/online";
	$json = json_decode(file_get_contents($fichierDesPersonnesOnline),TRUE);
	$json[$_SESSION['login']] = 0;
	file_put_contents($fichierDesPersonnesOnline, json_encode($json,TRUE));

	// Remove all session variables
	session_unset();

	// Destroy the session
	session_destroy();

    header('Location: ../index.php');
?>
