<?php
  if(@$_POST['action'] == 'entrar')
  {
    include 'conn.php';

    session_start();

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

      $resultado = array('sucesso' => '1');

    }
    include 'deconn.php';

    echo json_encode($resultado);
  }

  if(@$_POST['action'] == 'getGaleriaPHP')
  {
    include 'conn.php';

    //informação da modal
    $id = $_POST['id'];

    $galeria = mysqli_query($conn, "SELECT * FROM Posts WHERE PostID = $id");

    $gal = mysqli_fetch_array($galeria);

    $UtilInfo = mysqli_query($conn, "SELECT * FROM Utilizadores WHERE UtilID = $gal[UtilID]");

    $Info = mysqli_fetch_array($UtilInfo);

    $data = array();
    $data['Post'] = $gal;
    $data['User'] = $Info;
    echo json_encode($data);

    //manda o id da galeria onlick para o php
    //php vai buscar toda a informação do id na base de dados
    //criar função em js para criar as divs da galeria

    include 'deconn.php';
  }

  function getGaleria()
  {
    include 'conn.php';

    $Posts = mysqli_query($conn, "SELECT * FROM Posts LIMIT 12");

    while($Post = mysqli_fetch_array($Posts))
    {
      $nomeUtil = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Utilizadores WHERE UtilID = '$Post[UtilID]'"));


      echo'<!--CRIACAO DE UM POST NA GALERIA-->

      <div class="collection_container_item container_last_child">
          <div class="collection_container_name" onclick="getGallery('.$Post["PostID"].')" id="'.$Post["PostID"].'">
          <!--MODAL SLIDER DE IMAGENS-->

              <div class="text_gallery">
                  <div class="collection_container_name_info2 collection_container_name_info">'.$nomeUtil["UtilPNome"].' '.$nomeUtil["UtilUNome"].'</div>
                  <div class="collection_container_info_bot">
                      <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-love-24.png"></div>
                      <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-comments-24.png"></div>
                      <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-share-24.png"></div>
                  </div>
              </div>
          </div>
          <div class="collection_container_social">
              <div class="collection_social_btn">"Animais"</div>
              <div class="collection_social_btn">Pintura</div>

          </div>
        </div>';
    }

    include 'deconn.php';
  }

  function entrarPHP($logMail, $logPass)
  {
    include 'conn.php';

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
      echo '<script type="text/javascript" src="javascript/scriptslogin.js">
              inputColor();
            </script>';
      echo '<div class="erro_login">Dados inválidos</div>';
      
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

      echo '<meta http-equiv="refresh" content="0;url=login.php">';
    }
    include 'deconn.php';
  }

  function destruir_sessao()
  {
    @session_start();

    unset($_SESSION['CID']);
    unset($_SESSION["CPNome"]);
    unset($_SESSION["CUNome"]);

    session_destroy();
  }

  /* Função de registo */
function registo($regEmail, $regPass, $regRPass, $regNome, $regUNome, $regTlmv, $regGenero, $regData)
{
  include 'conn.php';

  $regEmail = mysqli_real_escape_string($conn, $regEmail);
  $regPass = mysqli_real_escape_string($conn, $regPass);
  $regNome = mysqli_real_escape_string($conn, $regNome);
  $regUNome = mysqli_real_escape_string($conn, $regUNome);
  $regTlmv = mysqli_real_escape_string($conn, $regTlmv);
  $regGenero = mysqli_real_escape_string($conn, $regGenero);
  $regData = mysqli_real_escape_string($conn, $regData);

  if($regpass != $regpassval)
  {
    echo 'As senhas não correspondem';
  }
  else
  {
      /* Encriptar a password */
      $regPass = base64_encode($regPass);
      /* Evitar duplicados */
      $existencia = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Conta WHERE Email = '$regEmail'"));

      if(!$existencia)
      {
        /* Ainda não há este email - cria registo */
        mysqli_query($conn, "INSERT INTO Conta (Email, Password, Telemovel) VALUES ('$regEmail', '$regPass', '$regTlmv')");

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
  include 'deconn.php';
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
