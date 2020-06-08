<?php
  function entrar($logMail, $logPass)
  {
    /* Encripta a pass para comparar com a pass encriptada que está na base de dados */
    $logPass = base64_encode($logPass);

    include 'connections/conn.php';

    /* Controlo de MYSQL Injections */
    $logMail = mysqli_real_escape_string($conn, $logMail);
    $logPass = mysqli_real_escape_string($conn, $logPass);
    $validar = mysqli_query($conn, "SELECT * FROM Conta WHERE Email = '$logMail' AND Password = '$logPass'");
    /* Array com resposta */
    $validado = mysqli_fetch_array($validar);

    if(!$validado)
    {
      /* Não existe user */
      echo 'Erro: Dados Inválidados; Tente Novamente';
    }
    else
    {
      /* Existe user */
      /* Alocar à sessão o id e o tipo de user logado */
      $_SESSION["uid"] = $validado["ContaID"];
      /* Refresh */
      echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }
    include 'connections/deconn.php';
  }

  /* Função de registo */
  function registo($regmail, $regpass, $regpassval, $u_nome, $u_snome)
  {
    include 'connections/conn.php';
    if($regpass != $regpassval)
    {
      echo 'As senhas não correspondem';
    }
    else
    {
        $regmail = mysqli_real_escape_string($conn, $regmail);
        $regpass = mysqli_real_escape_string($conn, $regpass);
        $u_nome = mysqli_real_escape_string($conn, $u_nome);
        $u_snome = mysqli_real_escape_string($conn, $u_snome);
        /* Encriptar a password */
        $regpass = base64_encode($regpass);
        /* Evitar duplicados */
        $existencia = mysqli_fetch_array(mysqli_query($conn, "SELECT logmail FROM entrar WHERE logmail = '$regmail'"));

        if(!$existencia)
        {
          /* Ainda não há este email - cria registo */
          mysqli_query($conn, "INSERT INTO entrar (logmail, logpass, utipo) VALUES ('$regmail', '$regpass', '1')");

          /* Ultimo id criado via conn */
          $uid = mysqli_insert_id($conn);

          mysqli_query($conn, "INSERT INTO clientes (cli_uid, cli_nome, cli_sobrenome) VALUES ('$uid', '$u_nome', '$u_snome')");

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
