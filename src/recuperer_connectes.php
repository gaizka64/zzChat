<?php

	 /* To initialise a session variable */
  	session_start();

	/* If the session var is not initialise, we redirect to the 'verf_connexion' page which */
	if (!empty($_SESSION['login']))
	{
		$chaineRetournee = "<ul>";
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
