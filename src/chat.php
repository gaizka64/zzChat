<?php
  /* To activate error display during dev */
  ini_set('display_errors', true); 
  ini_set('error_reporting', E_ALL);
  error_reporting(-1);

  /* To initialise a session variable */
  session_start();

  /* If the session var is not initialise, we redirect to the 'verf_connexion' page which */
  if (!isset($_SESSION['login']) OR empty($_SESSION['login']))
  {
    header('Location: verif_connexion.php');
  }

  include("fonctions.php");
  /* On récupère la traduction */
  $traduction = recupTraduction($_SESSION['lang']);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!-- Pour forcer à vider le cache -->
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1"> 

    <title>ZZ'Chat - <?php echo $_SESSION['login']; ?></title>
    <link href="../static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../static/css/css_chat.css">
	<script src="../static/ckeditor/ckeditor.js"></script>
  </head>
  
  <body>
  <?php include_once("../static/html/langues.html"); ?>
    <h1 class="centrer">ZZ'Chat</h1>
    <br />
    <div class="header">
      <a id="boutonDeco" href="deconnexion.php"> <button type="button"><?php echo $traduction["12"] ?></button> </a>
    </div>
   <fieldset>
      <div id="conversation"></div>
        <textarea id="message" rows="10" cols="10" autocomplete="off" onKeyPress="if (event.keyCode == 13) envoyerMessage()">
		</textarea>
		<script>
			CKEDITOR.replace( 'message' );
		</script>
        <button type="button" id="envoyer">></button>

    </fieldset>
    <div id="listeUtilisateurs">
      <h5 class="centrer"><?php echo $traduction["13"] ?>
        <div id="listeUtilisateur">
        </div>
      </h5>
    </div>
    <script type="text/javascript" src="../static/js/jquery.js"></script>
    <script type="text/javascript" src="../static/js/moteur_chatV2.js"></script>

  </body>
</html>
