<?php
  include 'conn.php';

  $IDUtil = $_POST['id'];

  $Followers = mysqli_query($conn, "SELECT UtilID, FollowID FROM Seguidores WHERE UtilID = $IDUtil");

  if(mysqli_num_rows($Followers) > 0)
  {
    while($TotalFollowers = mysqli_fetch_array($Followers))
    {
      $InfoUser = mysqli_query($conn, "SELECT UtilID, UtilUser, UtilPNome, UtilUNome, UtilFoto FROM Utilizadores WHERE UtilID = $TotalFollowers[FollowID]");

      $Info = mysqli_fetch_array($InfoUser);

      echo '<a style="text-decoration: none; color: black;" href="perfil.php?&uname='.$Info['UtilUser'].'&uid='.$Info['UtilID'].'"> <div class="modal_perfil_container_items">
              <div class="modal_perfil_container_items_img"> <img src="imagens/Utilizadores/'.$Info["UtilFoto"].'"> </div>
              <div class="modal_perfil_container_items_nome">
                <div class="modal_perfil_container_items_nome_name">'.$Info["UtilPNome"].' '.$Info["UtilUNome"].'</div>
                <div class="modal_perfil_container_items_nome_username">@'.$Info["UtilUser"].'</div>
              </div>
              </div>
            </a>';
    }
  }
  else
  {
    echo '<p class="modal_comentario_empty" style="padding-top: 68%; !important">Você não segue ninguém.</p>';
  }

  include 'deconn.php';
?>
