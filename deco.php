<?php
  session_start();
  $_SESSION = array();
  session_destroy();
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
    <div class="fond-deco">
  <div class ="deco"   width: 200px; marginleft: 50%;>
  <p>Vous êtes déconnecté</p>
 <a class="btn btn-success" href="index.php" role="button">Retour à l'accueil</a>
 </div>
 </div>
 </body>