<?php
  if(@$_POST['action'] == 'entrar')
  {
    include 'conn.php';

    $logMail = mysqli_real_escape_string($conn, $_POST['email']);
    $logPass = mysqli_real_escape_string($conn, $_POST['password']);
    /* Encripta a pass para comparar com a pass encriptada que está na base de dados */
    $logPass = base64_encode($logPass);


    /* Controlo de MYSQL Injections */
    $logMail = mysqli_real_escape_string($conn, $logMail);
    $logPass = mysqli_real_escape_string($conn, $logPass);
    $validar = mysqli_query($conn, "SELECT * FROM Conta WHERE Email = '$logMail' AND Password = '$logPass'");
    /* Array com resposta */
    $validado = mysqli_fetch_array($validar);

    if(!$validado)
    {
      /* Não existe user */
      $resultado = array('erro' => '1');
    }
    else
    {
      /* Existe user */
      /* Alocar à sessão o id e o tipo de user logado */
      $_SESSION["CID"] = $validado["ContaID"];

      $validarUtil = mysqli_query($conn, "SELECT * FROM Utilizadores WHERE ContaID = '$_SESSION[CID]'");

      $validadoUtil = mysqli_fetch_array($validarUtil);

      $_SESSION["CPNome"] = $validadoUtil["UtilPNome"];
      $_SESSION["CUNome"] = $validadoUtil["UtilUNome"];
      /* Refresh */

      $resultado = array('sucesso' => '1');
    }
    include 'deconn.php';

    echo json_encode($resultado);
  }

  /* Função de registo */
  function registo($regEmail, $regPass, $regRPass, $regPnome, $regUnome, $regTlmv)
  {
    include 'connections/conn.php';
    if($regpass != $regpassval)
    {
      echo 'As senhas não correspondem';
    }
    else
    {
        $regEmail = mysqli_real_escape_string($conn, $regEmail);
        $regPass = mysqli_real_escape_string($conn, $regPass);
        $regNome = mysqli_real_escape_string($conn, $regNome);
        $regUNome = mysqli_real_escape_string($conn, $regUNome);
        $regTlmv = mysqli_real_escape_string($conn, $regTlmv);
        $regData = mysqli_real_escape_string($conn, $regData);

        /* Encriptar a password */
        $regPass = base64_encode($regPass);
        /* Evitar duplicados */
        $existencia = mysqli_fetch_array(mysqli_query($conn, "SELECT Email FROM Conta WHERE Email = '$regEmail'"));

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

  function utilizador()
  {
    if(@!$_SESSION["uid"])
    {
      echo '<li> <a href="login.php"> <i class="fas fa-user"></i> </a> </li>';
    }
    else
    {
      echo '<li> <a href="logout.php"> <i class="fas fa-user-cog"></i> </a> </li>';
    }
  }
?>
