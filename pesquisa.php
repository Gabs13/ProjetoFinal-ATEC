<?php
  require 'functions/functions.php';
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Artifex</title>
    <link rel="icon" href="imagens/logotipo/browserIconCircle.png">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-app.js"></script>
		<script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-database.js"></script>
		<script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-analytics.js"></script>

    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

    <script src="javascript/scripts.js"></script>

  </head>
<body>


    <?php
      include 'includes/navbar.php';

      include 'includes/resultadoPesquisa.php';

      include 'includes/footerPrincipal.php';

    ?>
</body>
