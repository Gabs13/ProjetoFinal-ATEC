<?php
  include 'conn.php';

  $Limite1 = $_POST['fotoCount'];

  $Posts = mysqli_query($conn, "SELECT * FROM Posts LIMIT $Limite1");

  $texto = "";

  include 'functions.php';

  global $Mult;

  echo '<script> console.log('.$Mult.') </script>';

  while($Post = mysqli_fetch_array($Posts))
  {
    $nomeUtil = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Utilizadores WHERE UtilID = '$Post[UtilID]'"));

    $fotoPost = mysqli_fetch_array(mysqli_query($conn, "SELECT CaminhoFoto FROM Fotos WHERE PostID = '$Post[PostID]'"));

    echo '<!--CRIACAO DE UM POST NA GALERIA-->';
    if ($Mult % 12 == 0)
    {
      echo '<div class="collection_container_item container_last_child" style="width: calc(64.9% - 26px); height: 52.455em;">';
    }
    else
    {
      echo '<div class="collection_container_item container_last_child" style="height: 24.8em;">';
    }

    echo '<div class="collection_container_name" style="background-image: url(/ProjetoFinal/imagens/posts/'.$fotoPost["CaminhoFoto"].');background-size: cover; background-position: center;" onclick="getGallery('.$Post["PostID"].')" id="'.$Post["PostID"].'">
        <!--MODAL SLIDER DE IMAGENS-->

            <div class="text_gallery">
                <div class="collection_container_name_info2 collection_container_name_info">'.$nomeUtil["UtilPNome"].' '.$nomeUtil["UtilUNome"].'</div>
            </div>
        </div>

      </div>';
      $Mult = $Mult + 1;
  }

  include 'deconn.php';

?>
