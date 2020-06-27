<?php
  if(@$_POST['action'] == 'getGaleriaPHP')
  {
    include 'conn.php';

    session_start();

    //informação da modal
    $PostID = $_POST['id'];

    $Galeria = mysqli_query($conn, "SELECT PostID, PubDesc, DataPublicacao, UtilID FROM Posts WHERE PostID = $PostID");

    $Gal = mysqli_fetch_array($Galeria);

    $Foto = mysqli_query($conn, "SELECT CaminhoFoto FROM Fotos WHERE PostID = $PostID");

    $InfoFoto = mysqli_fetch_array($Foto);

    $UtilInfo = mysqli_query($conn, "SELECT UtilID, UtilPNome, UtilUNome, UtilDataNasc, UtilGenero, ContaID FROM Utilizadores WHERE UtilID = $Gal[UtilID]");

    $Info = mysqli_fetch_array($UtilInfo);

    $LikePosts = mysqli_query($conn, "SELECT LikePostID, PostID, UtilID, DataLike FROM LikesPosts WHERE UtilID = $_SESSION[UtilID] AND PostID = $PostID");

    $LikePost = mysqli_num_rows($LikePosts);

    $Data = array();
    $Data['Post'] = $Gal;
    $Data['User'] = $Info;
    $Data['Like'] = $LikePost;
    $Data['Foto'] = $InfoFoto;

    echo json_encode($Data);

    //manda o id da galeria onlick para o php
    //php vai buscar toda a informação do id na base de dados
    //criar função em js para criar as divs da galeria

    include 'deconn.php';
  }

  if(@$_POST['action'] == 'addCommentPHP')
  {
    include 'conn.php';

    session_start();

    $PostID = $_POST['id'];
    $ContentComment = $_POST['comentario'];

    mysqli_query($conn, "INSERT INTO Comentarios (PostID, UtilID, Mensagem) VALUES ('$PostID', '$_SESSION[UtilID]', '$ContentComment')");

    $Galeria = mysqli_query($conn, "SELECT PostID, PubDesc, DataPublicacao, UtilID FROM Posts WHERE PostID = $PostID");

    $Gal = mysqli_fetch_array($Galeria);

    $Data = array();
    $Data['Post'] = $Gal;

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'removeCommentPHP')
  {
    include 'conn.php';

    $CommentID = $_POST['id'];

    $Galeria = mysqli_query($conn, "SELECT ComentarioID, PostID, UtilID, Mensagem, DataMsg FROM Comentarios WHERE ComentarioID = $CommentID");

    $Gal = mysqli_fetch_array($Galeria);

    $Data = array();
    $Data['Post'] = $Gal;

    mysqli_query($conn, "DELETE FROM Comentarios WHERE ComentarioID = $CommentID");

    mysqli_query($conn, "DELETE FROM LikesComentarios WHERE ComentarioID = $CommentID");

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'likePostPHP')
  {
    include 'conn.php';

    session_start();

    $PostID = $_POST['id'];

    $LikePosts = mysqli_query($conn, "SELECT LikePostID, PostID, UtilID FROM LikesPosts WHERE PostID = $PostID AND UtilID = $_SESSION[UtilID]");

    $Data = array();

    $Data['Post'] = $PostID;

    if(mysqli_num_rows($LikePosts) == 0)
    {
      mysqli_query($conn, "INSERT INTO LikesPosts(PostID, UtilID) VALUES ($PostID, $_SESSION[UtilID])");
      $Data['Like'] = true;
    }
    else
    {
      mysqli_query($conn, "DELETE FROM LikesPosts WHERE PostID = $PostID AND UtilID = $_SESSION[UtilID]");
      $Data['Like'] = false;
    }

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'likeCommentPHP')
  {
    include 'conn.php';

    session_start();

    $CommentID = $_POST['id'];

    $LikeComment = mysqli_query($conn, "SELECT LikeCommentID, ComentarioID, UtilID FROM LikesComentarios WHERE ComentarioID = $CommentID AND UtilID = $_SESSION[UtilID]");

    $Data = array();

    $Data['Comentario'] = $CommentID;

    if(mysqli_num_rows($LikeComment) == 0)
    {
      mysqli_query($conn, "INSERT INTO LikesComentarios(ComentarioID, UtilID) VALUES ($CommentID, $_SESSION[UtilID])");
      $Data['Like'] = true;
    }
    else
    {
      mysqli_query($conn, "DELETE FROM LikesComentarios WHERE ComentarioID = $CommentID AND UtilID = $_SESSION[UtilID]");
      $Data['Like'] = false;
    }

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'getReplyCommentUserPHP')
  {
    include 'conn.php';

    $IDComentario = $_POST['id'];

    $IDUtil = mysqli_query($conn, "SELECT UtilID FROM Comentarios WHERE ComentarioID = $IDComentario");

    $Util = mysqli_fetch_array($IDUtil);

    $NomeUtil = mysqli_query($conn, "SELECT UtilPNome, UtilUNome, UtilUser FROM Utilizadores WHERE UtilID = $Util[UtilID]");

    $DadosUtil = mysqli_fetch_array($NomeUtil);

    $Data = array();

    $Data['Util'] = $DadosUtil;

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'replyCommentPHP')
  {
    include 'conn.php';

    session_start();

    $ComentarioID = $_POST['id'];
    $ContentComment = $_POST['comentario'];
    $PostID = $_POST['postid'];

    mysqli_query($conn, "INSERT INTO ReplyComentarios(UtilID, ComentarioID, Mensagem) VALUES ('$_SESSION[UtilID]', '$ComentarioID', '$ContentComment')");

    $Data['Post'] = $PostID;

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'checkUserName')
  {
    include 'conn.php';

    $UserName = $_POST['nome'];

    $User = mysqli_query($conn, "SELECT UtilUser FROM Utilizadores WHERE UtilUser = '$UserName'");

     if(mysqli_num_rows($User) > 0)
     {
       $Data['user'] = true;
     }
     else
     {
       $Data['user'] = false;
     }

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'getInfoUserPHP')
  {
    include 'conn.php';

    $Username = $_POST['nome'];

    $IDUser = mysqli_query($conn, "SELECT UtilID FROM Utilizadores WHERE UtilUser = '$Username'");

    $resultado = mysqli_fetch_array($IDUser);

    $Data = array('Info'=>$resultado['UtilID']);

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'carregarPerfilPHP')
  {
    include 'conn.php';

    session_start();

    $UserName = $_POST['nome'];

    $User = mysqli_query($conn, "SELECT UtilID, UtilUser, UtilPNome, UtilUNome, UtilDesc, UtilFoto FROM Utilizadores WHERE UtilUser = '$UserName'");

    $DadosUtil = mysqli_fetch_array($User);

    $Followers = mysqli_query($conn, "SELECT UtilID, FollowID FROM Seguidores WHERE UtilID = $DadosUtil[UtilID]");

    $TotalFollowers = mysqli_num_rows($Followers);

    $Following = mysqli_query($conn, "SELECT UtilID, FollowID FROM Seguidores WHERE FollowID = $DadosUtil[UtilID]");

    $TotalFollowing = mysqli_num_rows($Following);

    $Posts = mysqli_query($conn, "SELECT PostID FROM Posts WHERE UtilID = $DadosUtil[UtilID]");

    $TotalPosts = mysqli_num_rows($Posts);

    $isFollowing = mysqli_query($conn, "SELECT SeguidoresID, UtilID, FollowID FROM Seguidores WHERE UtilID = $_SESSION[UtilID] && FollowID = $DadosUtil[UtilID]");

    $Data = array();

    if(mysqli_num_rows($isFollowing) == 0)
    {
      $Data['Seguir'] = false;
    }
    else
    {
      $Data['Seguir'] = true;
    }

    $Data['User'] = $DadosUtil;

    $Data['TFollowing'] = $TotalFollowers;

    $Data['TFollowers'] = $TotalFollowing;

    $Data['TPosts'] = $TotalPosts;

    $Data['IDSessao'] = $_SESSION['UtilID'];

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(@$_POST['action'] == 'seguirPHP')
  {
    include 'conn.php';

    $IDFollow = $_POST['id'];

    session_start();

    $isFollowing = mysqli_query($conn, "SELECT SeguidoresID, UtilID, FollowID FROM Seguidores WHERE UtilID = $_SESSION[UtilID] && FollowID = $IDFollow");

    $Data = array();

    if(mysqli_num_rows($isFollowing) == 0)
    {
      mysqli_query($conn, "INSERT INTO Seguidores(UtilID, FollowID) VALUES ($_SESSION[UtilID], $IDFollow)");
      $Data['Seguir'] = true;
    }
    else
    {
      mysqli_query($conn, "DELETE FROM Seguidores WHERE UtilID = $_SESSION[UtilID] && FollowID = $IDFollow");
      $Data['Seguir'] = false;
    }

    $Followers = mysqli_query($conn, "SELECT UtilID, FollowID FROM Seguidores WHERE UtilID = $IDFollow");

    $TotalFollowers = mysqli_num_rows($Followers);

    $Following = mysqli_query($conn, "SELECT UtilID, FollowID FROM Seguidores WHERE FollowID = $IDFollow");

    $TotalFollowing = mysqli_num_rows($Following);

    $Data['TFollowing'] = $TotalFollowers;

    $Data['TFollowers'] = $TotalFollowing;

    include 'deconn.php';

    echo json_encode($Data);
  }

  if(isset($_POST["bt_postarfoto_perfil"]))
  {
    $file = $_FILES['bt_carregarfoto'];

    $fileName = $_FILES['bt_carregarfoto']['name'];
    $fileTmpName = $_FILES['bt_carregarfoto']['tmp_name'];
    $fileSize = $_FILES['bt_carregarfoto']['size'];
    $fileError = $_FILES['bt_carregarfoto']['error'];
    $fileType = $_FILES['bt_carregarfoto']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed))
    {
      if ($fileError === 0)
      {
        if ($fileSize < 1000000)
        {
          $fileNameNew = uniqid('', true).".".$fileActualExt;

          $fileDestination = '../imagens/Utilizadores/'.$fileNameNew;

          move_uploaded_file($fileTmpName, $fileDestination);

          include 'conn.php';

          session_start();

          mysqli_query($conn, "UPDATE Utilizadores SET UtilFoto = '$fileNameNew' WHERE UtilID = $_SESSION[UtilID]");

          $Util = mysqli_query($conn, "SELECT UtilUser, UtilID FROM Utilizadores WHERE UtilID = $_SESSION[UtilID]");

          $DadosUtil = mysqli_fetch_array($Util);

          header("Location: http://localhost/ProjetoFinal/perfil.php?&uname=".$DadosUtil['UtilUser']."&uid=".$DadosUtil['UtilID']);

          include 'deconn.php';
        }
        else
        {
          echo "O ficheiro é muito grande!";
        }
      }
    }
    else
    {
      echo "Formato de ficheiro inválido!";
    }
  }

  if(isset($_POST["bt_postarfoto"]))
  {
    $file = $_FILES['bt_carregarfoto'];
    $desc = $_POST["tb_desc"];

    $fileName = $_FILES['bt_carregarfoto']['name'];
    $fileTmpName = $_FILES['bt_carregarfoto']['tmp_name'];
    $fileSize = $_FILES['bt_carregarfoto']['size'];
    $fileError = $_FILES['bt_carregarfoto']['error'];
    $fileType = $_FILES['bt_carregarfoto']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed))
    {
      if ($fileError === 0)
      {
        if ($fileSize < 1000000)
        {
          $fileNameNew = uniqid('', true).".".$fileActualExt;

          $fileDestination = '../imagens/posts/'.$fileNameNew;

          move_uploaded_file($fileTmpName, $fileDestination);

          include 'conn.php';

          session_start();

          mysqli_query($conn, "INSERT INTO Posts(PubDesc, UtilID) VALUES ('$desc', $_SESSION[UtilID])");

          $PID = mysqli_insert_id($conn);

          mysqli_query($conn, "INSERT INTO Fotos(CaminhoFoto, PostID) VALUES ('$fileNameNew', $PID)");


          include 'deconn.php';


          header("Location: http://localhost/ProjetoFinal/login.php?uploadsucess=1");
        }
        else
        {
          echo "O ficheiro é muito grande!";
        }
      }
    }
    else
    {
      echo "Formato de ficheiro inválido!";
    }
  }

  $Mult = 3;

  function getGaleria()
  {
    include 'conn.php';

    global $Mult;

    $Posts = mysqli_query($conn, "SELECT PostID, PubDesc, DataPublicacao, UtilID FROM Posts LIMIT 12");

    while($Post = mysqli_fetch_array($Posts))
    {
      $nomeUtil = mysqli_fetch_array(mysqli_query($conn, "SELECT UtilID, UtilPNome, UtilUNome FROM Utilizadores WHERE UtilID = '$Post[UtilID]'"));

      $fotoPost = mysqli_fetch_array(mysqli_query($conn, "SELECT CaminhoFoto FROM Fotos WHERE PostID = '$Post[PostID]'"));

      echo '<!--CRIACAO DE UM POST NA GALERIA-->';
      if ($Mult % 12 == 0)
      {
        echo '<div class="collection_container_item container_last_child" style="width: calc(64.9% - 26px); height: 52.455em;">';
      }
      else
      {
        echo '<div class="collection_container_item container_last_child" style="height: 24.84em;">';
      }

      echo '<div class="collection_container_name" style="background-image: url(/ProjetoFinal/imagens/posts/'.$fotoPost["CaminhoFoto"].'); background-size: cover; background-position: center;" onclick="getGallery('.$Post["PostID"].')" id="'.$Post["PostID"].'">
          <!--MODAL SLIDER DE IMAGENS-->

              <div class="text_gallery">
                  <div class="collection_container_name_info2 collection_container_name_info">'.$nomeUtil["UtilPNome"].' '.$nomeUtil["UtilUNome"].'</div>
              </div>
          </div>
        </div>';
        $Mult = $Mult + 1;
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
    $validar = mysqli_query($conn, "SELECT ContaID FROM Conta WHERE Email = '$logMail' AND Password = '$logPass'");
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

      $validarUtil = mysqli_query($conn, "SELECT UtilID, UtilPNome, UtilUNome, UtilUser FROM Utilizadores WHERE ContaID = '$_SESSION[CID]'");

      $validadoUtil = mysqli_fetch_array($validarUtil);

      $_SESSION["UtilID"] = $validadoUtil["UtilID"];
      $_SESSION["CPNome"] = $validadoUtil["UtilPNome"];
      $_SESSION["CUNome"] = $validadoUtil["UtilUNome"];
      $_SESSION["UtilUser"] = $validadoUtil["UtilUser"];

      echo '<meta http-equiv="refresh" content="0;url=login.php">';
    }
    include 'deconn.php';
  }

  function destruir_sessao()
  {
      @session_start();

      unset($_SESSION["CID"]);
      unset($_SESSION["UtilID"]);
      unset($_SESSION["CPNome"]);
      unset($_SESSION["CUNome"]);

      session_destroy();
    }

    /* Função de registo */

  function registo($regEmail, $regPass, $regRPass, $regNome, $regUNome, $regTlmv, $regGenero, $regData, $regUser)
  {
    include 'conn.php';

    $regEmail = mysqli_real_escape_string($conn, $regEmail);
    $regPass = mysqli_real_escape_string($conn, $regPass);
    $regRPass = mysqli_real_escape_string($conn, $regRPass);
    $regNome = mysqli_real_escape_string($conn, $regNome);
    $regUNome = mysqli_real_escape_string($conn, $regUNome);
    $regTlmv = mysqli_real_escape_string($conn, $regTlmv);
    $regGenero = mysqli_real_escape_string($conn, $regGenero);
    $regData = mysqli_real_escape_string($conn, $regData);
    $regUser = mysqli_real_escape_string($conn, $regUser);

    if($regPass != $regRPass)
    {
      echo 'As senhas não correspondem';
    }
    else
    {
        /* Encriptar a password */
        $regPass = base64_encode($regPass);
        /* Evitar duplicados */
        $existencia = mysqli_fetch_array(mysqli_query($conn, "SELECT Email FROM Conta WHERE Email = '$regEmail'"));

        if(!$existencia)
        {
          /* Ainda não há este email - cria registo */
          mysqli_query($conn, "INSERT INTO Conta (Email, Password, Telemovel) VALUES ('$regEmail', '$regPass', '$regTlmv')");

          /* Ultimo id criado via conn */
          $cid = mysqli_insert_id($conn);

          mysqli_query($conn, "INSERT INTO Utilizadores (UtilPNome, UtilUNome, UtilDataNasc, UtilGenero, ContaID, UtilUser) VALUES ('$regNome', '$regUNome', '$regData', '$regGenero', '$cid', '$regUser')");

          echo '<script language = "javascript">';
          echo 'alert("Obrigado. Registo efetuado com sucesso")';
          echo '</script>';

          echo '<meta http-equiv="refresh" content="0;url=index.php">';
        }
        else
        {
          echo 'O email indicado já se encontra registado';
        }
    }

    include 'deconn.php';
  }

  function devolverNome($id)
  {
    include 'conn.php';

    if (!empty($id))
    {
      $nomeUtil = mysqli_query($conn, "SELECT * FROM Utilizadores WHERE UtilID = $id");

      $nome = mysqli_fetch_array($nomeUtil);

      echo $nome['UtilPNome'];
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
