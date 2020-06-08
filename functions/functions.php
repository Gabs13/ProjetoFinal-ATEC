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


  /* Função de registo */
  function registo($regMail, $regPass, $regRPass, $regNome, $regUNome, $regTlmv, $regGenero, $regData)
  {
    include 'connections/conn.php';
    if($regPass != $regRPass)
    {
      echo '<script language = "javascript">';
      echo 'alert("As senhas não correspondem!")';
      echo '</script>';
    }
    else
    {
        $regMail = mysqli_real_escape_string($conn, $regMail);
        $regPass = mysqli_real_escape_string($conn, $regPass);
        $regNome = mysqli_real_escape_string($conn, $regNome);
        $regUNome = mysqli_real_escape_string($conn, $regUNome);
        $regTlmv = mysqli_real_escape_string($conn, $regTlmv);
        $regData = mysqli_real_escape_string($conn, $regData);
        /* Encriptar a password */
        $regPass = base64_encode($regPass);

        /* Evitar duplicados */
        $existencia = mysqli_fetch_array(mysqli_query($conn, "SELECT Email FROM Conta WHERE Email = '$regMail'"));

        if(!$existencia)
        {
          /* Ainda não há este email - cria registo */
          mysqli_query($conn, "INSERT INTO Conta (Email, Password, Telemovel) VALUES ('$regMail', '$regPass', $regTlmv)");

          /* Ultimo id criado via conn */
          $cid = mysqli_insert_id($conn);

          mysqli_query($conn, "INSERT INTO Utilizadores (UtilPNome, UtilUNome, UtilDataNasc, UtilGenero, ContaID) VALUES ('$regNome', '$regUNome', '$regData', '$regGenero', '$cid')");

          echo '<script language = "javascript">';
          echo 'alert("Obrigado. Registo efetuado com sucesso")';
          echo '</script>';
        }
        else
        {
          echo 'O email indicado já se encontra registado';
        }
    }
    include 'connections/deconn.php';
  }
?>
