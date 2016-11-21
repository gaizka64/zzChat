<?php

	 /* To initialise a session variable */
  	session_start();

	/* If the session var is not initialise, we redirect to the 'verf_connexion' page which */
	if (isset($_SESSION['login']) AND !empty($_SESSION['login']))
	{
<<<<<<< HEAD
		$chaineRetournee = "<ul>";
=======
		$chaineRetournee = "<h5 class='centrer'> Utilisateurs connectés </h5> <ul>";
>>>>>>> 2b0d6ab16dc53192b095db7bc901d5fe070ae5a1
		$json  = json_decode(file_get_contents("../db/online"),TRUE);
		foreach ($json as $key => $value) 
		{
			if ($value == 1)
			{
				$chaineRetournee = $chaineRetournee . "<li>" . $key . "</li>";
			}
		}
		$chaineRetournee = $chaineRetournee . "</ul>";
		echo "$chaineRetournee";
	}
?>