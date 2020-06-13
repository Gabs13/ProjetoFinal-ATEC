<?php

  include 'conn.php';

  $Limite1 = $_POST['fotoCount'];

  $Posts = mysqli_query($conn, "SELECT * FROM Posts LIMIT $Limite1");

  $texto = "";

  while($Post = mysqli_fetch_array($Posts))
  {
    $nomeUtil = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Utilizadores WHERE UtilID = '$Post[UtilID]'"));


    echo '<!--CRIACAO DE UM POST NA GALERIA-->

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

?>
