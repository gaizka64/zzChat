<?php
/* We define here functions that will manipulate the json file with users information */



// Check if the user is in the file
function existe($nomFic, $userCherche)
{
	$existe = false; // By default we consider that the user doesn't exist in the file
	if (file_exists($nomFic))
		$existe = array_key_exists($userCherche, json_decode(file_get_contents($nomFic), TRUE));

	return $existe;
}



// Create a new user in the file
function ajouter($nomFic,$userAAjouter,$mdp)
{
    if (existe($nomFic,$userAAjouter))
		$ajout = false;

	else
	{
		$json = json_decode(file_get_contents($nomFic),TRUE); // Decode the json file name to array
		$json[$userAAjouter] = hash("sha512",$mdp); // Add the new user with his password with hash function
    	file_put_contents($nomFic, json_encode($json,TRUE)); // Encode the array to json, and write in the file
    	$ajout = true;
    }

    return $ajout;
}



// Delete an user of the file
function supprimer($nomFic,$userASupprimer)
{
	if (existe($nomFic,$userASupprimer))
	{
		$json = json_decode(file_get_contents($nomFic),TRUE); //Decode the json file name to array
		unset($json[$userASupprimer]); // Destroy the corresponding line in the array
		file_put_contents($nomFic, json_encode($json,TRUE)); // Save the file
		$suppr = true;
	}
	else
		$suppr = false ;

	return $suppr;
}



// Get the password of the user
function getMdp($nomFic,$user)
{
	$pswd = NULL;
	if (file_exists($nomFic))
	{
		$json = json_decode(file_get_contents($nomFic),TRUE); // open the file in a array
		if (array_key_exists($user, $json))
			$pswd = $json[$user];
	}
	return $pswd;
}



// Add an user in the connected users list
function ajouterDansListeDesConnectes($nomUtilisateur, $nomFic)
{
	$ajoute = false;
	if (array_key_exists($numUtilisateur, json_decode(file_get_contents($nomFic), TRUE))) // if the user exists
	{
		$fichierDesPersonnesOnline = "../db/online"; // Path to the connected users file
		$json = json_decode(file_get_contents($fichierDesPersonnesOnline),TRUE); // Read the online users file
		$json[$nomUtilisateur] = 1; // Connect the user
		file_put_contents($fichierDesPersonnesOnline, json_encode($json,TRUE)); // Write in the file
		$ajoute = true;
	}

	return $ajoute;
}
?>
