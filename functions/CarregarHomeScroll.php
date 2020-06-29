<?php
  include 'conn.php';

  session_start();

  $Limite1 = $_POST['fotoCount'];

  $Followers = mysqli_query($conn, "SELECT UtilID, FollowID, (SELECT DataPublicacao FROM Posts WHERE UtilID = FollowID ORDER BY DataPublicacao DESC LIMIT 1) as DataPub FROM Seguidores WHERE UtilID = $_SESSION[UtilID] ORDER BY DataPub DESC LIMIT $Limite1");

  if(mysqli_num_rows($Followers) > 0)
  {
    while($TotalFollowers = mysqli_fetch_array($Followers))
    {
      $Posts = mysqli_query($conn, "SELECT PostID, PubDesc, DataPublicacao, Posts.UtilID, UtilUser, UtilPNome, UtilUNome, UtilFoto FROM Posts LEFT JOIN Utilizadores ON Posts.UtilID = Utilizadores.UtilID WHERE Posts.UtilID = $TotalFollowers[FollowID] ORDER BY DataPublicacao DESC");
      if(mysqli_num_rows($Posts) > 0)
      {
        while($InfoPosts = mysqli_fetch_array($Posts))
        {
          $Foto = mysqli_query($conn, "SELECT CaminhoFoto, PostID FROM Fotos WHERE PostID = $InfoPosts[PostID]");

          $InfoFoto = mysqli_fetch_array($Foto);

          echo '  <div class="collection_container_item container_last_child newhome_collection_container" style="height: 24.84em;">
                  <div class="casa_post_header">
                  <div class="casa_post_header_img">';
                  if($InfoPosts['UtilFoto'] != null)
                  {
                    echo '<img src="imagens/Utilizadores/'.$InfoPosts['UtilFoto'].'">';
                  }
                  else
                  {
                    echo '<img src="imagens/Icones/icons8-male-user-26.png">';
                  }

             echo'</div>
                  <div class="casa_post_header_info">
                    <div class="casa_post_header_info_name">'.$InfoPosts['UtilPNome'].' '.$InfoPosts['UtilUNome'].'</div>
                    <div class="casa_post_header_info_username">@'.$InfoPosts['UtilUser'].'</div>
                  </div>
                </div>';


          echo '<div class="newhome_collection_img" style="background-image: url(/ProjetoFinal/imagens/posts/'.$InfoFoto["CaminhoFoto"].'); background-size: cover; background-position: center;" onclick="getGallery('.$InfoPosts["PostID"].')" id="'.$InfoPosts["PostID"].'">
              <!--MODAL SLIDER DE IMAGENS-->
              </div>
            </div>';
        }
      }
    }
  }

  include 'deconn.php';
?>
