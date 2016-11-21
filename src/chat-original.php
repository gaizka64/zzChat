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
  </head>
  
  <body>
    <h1 class="centrer">ZZ'Chat</h1>
    <br />
    <div class="header">
      <a id="boutonDeco" href="deconnexion.php"> <button type="button">Deconnexion</button> </a>
    </div>
   <fieldset>
      <div id="conversation"></div>
        <div id="barreFormatage">
          <button type="button" class="btn btn-default btn-xs" aria-label="Bold">
           <span class="glyphicon glyphicon-bold" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-default btn-xs" aria-label="Italic">
           <span class="glyphicon glyphicon-italic" aria-hidden="true"></span>
          </button>
        </div>
        <input type="text" id="message" autocomplete="off" onKeyPress="if (event.keyCode == 13) envoyerMessage()">
        <button type="button" id="envoyer" >></button>

    </fieldset>
    <div id="listeUtilisateurs">
      <h5 class="centrer">Utilisateurs connectés</h5>
    </div>
    <script type="text/javascript" src="../static/js/jquery.js"></script>
    <script type="text/javascript" src="../static/js/moteur_chatV2.js"></script>

  </body>
</html>
