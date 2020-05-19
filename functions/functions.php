<?php


  function entrar($logmail, $logpass)
  {
    /* Encripta a pass para comparar com a pass encriptada que está na base de dados */
    //$logpass = base64_encode($logpass);

    include 'connections/conn.php';

    /* Controlo de MYSQL Injections */
    $logmail = mysqli_real_escape_string($conn, $logmail);
    $logpass = mysqli_real_escape_string($conn, $logpass);
    $validar = mysqli_query($conn, "SELECT * FROM utilizadores");

    while ($row = mysqli_fetch_assoc(mysqli_fetch_array($validar))) {
      echo $row;
    }

    /* Array com resposta */



    include 'connections/deconn.php';
  }
?>
