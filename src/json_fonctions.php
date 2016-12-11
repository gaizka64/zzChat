<?php
// We define here functions that will manipulate the json file with users informations

function existe($nomFic, $userCherche)
{
	$existe = false; // By default we consider that the user doesn't exist in the file

	// On peu tester d'abord si le fichier existe

	$json = json_decode(file_get_contents($nomFic), TRUE);

	if (array_key_exists($userCherche, $json) == 1)
	{
		$existe = true;
	}

	return $existe;
}

function ajouter($nomFic, $userAAjouter, $mdp)
{
	$json  = json_decode(file_get_contents($nomFic), TRUE);
	$json[$userAAjouter] = hash("sha512", $mdp);
	file_put_contents($nomFic, json_encode($json, TRUE));
}

function supprimer($nomFic, $userASupprimer)
{
	$json = json_decode(file_get_contents($nomFic), TRUE);
	unset($json[$userASupprimer]);
	file_put_contents($nomFic, json_encode($json, TRUE));
}

function getMdp($nomFic, $user)
{
    $json = json_decode(file_get_contents($nomFic), TRUE);

    if (array_key_exists($user, $json) == 1)
	{
		return $json[$user];
	}
    // Php retourne NULL par défaut.
}

function ajouterDansListeDesConnectes($nomUtilisateur)
{
	$fichierDesPersonnesOnline = "../db/online";
	$json = json_decode(file_get_contents($fichierDesPersonnesOnline), TRUE);
	$json[$nomUtilisateur] = 1;
	file_put_contents($fichierDesPersonnesOnline, json_encode($json, TRUE));
}
?>
