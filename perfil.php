<?php
  require 'functions/functions.php';
  session_start();
?>

<!DOCTYPE html>
    <html lang="pt">
        <head>
        <meta charset="utf-8">
        <title>ArtIN</title>
        <link rel="icon" href="imagens/logotipo/browserIconCircle.png">
          <!-- Perfil -->
          <link rel="stylesheet" type="text/css" href="css/estilo.css">

          <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

          <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

          <!-- Perfil -->
        </head>
        <body>

        <?php
            if (isset($_SESSION['UtilID'])) {
              include 'includes/navbar.php';
            }


            if(@$_GET['uname'] && @$_GET['uid'])
            {
              include 'includes/perfil_novo.php';
            }

            include 'includes/footerPrincipal.php';
        ?>

        </body>
    </html>
