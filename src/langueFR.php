<?php
  /* To activate error display during dev */
  ini_set('display_errors', true); 
  ini_set('error_reporting', E_ALL);
  //error_reporting(-1);

  /* To initialise a session variable */
  session_start();
  $_SESSION['lang'] = "fr";
  $test = $_SERVER['HTTP_REFERER'];
  header("Location: " .$test);
  exit;
?>