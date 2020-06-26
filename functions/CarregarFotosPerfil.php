<?php
include 'conn.php';

$UserID = $_POST['UserID'];

$Posts = mysqli_query($conn, "SELECT UtilID, PostID FROM Posts WHERE UtilID = $UserID");

include 'functions.php';

while($Post = mysqli_fetch_array($Posts))
{
  $nomeUtil = mysqli_fetch_array(mysqli_query($conn, "SELECT UtilID, UtilUser, UtilPNome, UtilUNome FROM Utilizadores WHERE UtilID = '$Post[UtilID]'"));

  $fotoPost = mysqli_fetch_array(mysqli_query($conn, "SELECT CaminhoFoto FROM Fotos WHERE PostID = '$Post[PostID]'"));

  echo '<!--CRIACAO DE UM POST NA GALERIA-->';

  echo '<div class="collection_container_item container_last_child" style="height: 24.84em;" onclick="getGallery('.$Post["PostID"].');">
          <div class="collection_container_name" style="background-image: url(/ProjetoFinal/imagens/posts/'.$fotoPost["CaminhoFoto"].');background-size: cover; background-position: center;" onclick="getGallery('.$Post["PostID"].')" id="'.$Post["PostID"].'">
          <!--MODAL SLIDER DE IMAGENS-->

              <div class="text_gallery">
                  <div class="collection_container_name_info2 collection_container_name_info">'.$nomeUtil["UtilPNome"].' '.$nomeUtil["UtilUNome"].'</div>
              </div>
          </div>
        </div>';
}

include 'deconn.php';
?>
