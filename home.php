<?php
  require 'functions/functions.php';
  session_start();

  if (!isset($_SESSION["UtilID"]))
   {
      header("location: index.php");
   }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ArtIN</title>
    <link rel="icon" href="imagens/logotipo/browserIconCircle.png">
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+HK&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo&display=swap" rel="stylesheet">

    <script src="javascript/scriptshome.js"></script>
  </head>
  <body>
    <?php
    if(@$_GET['pid'] && @$_GET['uid'])
    {
      header("Location: http://localhost/ProjetoFinal/login.php?pid=".$_GET['pid']."&uid=".$_GET['uid']);
    }

    include 'includes/navbar.php';

    include 'includes/testehome.php';



    include 'includes/footerPrincipal.php';
    ?>
    <!-- teste -->
  </body>
  <script src="javascript/scriptslogin.js"></script>
</html>
