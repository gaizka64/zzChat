<?php

	/* To initialise a session variable */
  	session_start();

	/* If the session var is not initialised, we redirect to the 'verif_connexion' */
	if (!empty($_SESSION['login']))
	{
		readfile("../db/discussion.txt");
	}
?>
