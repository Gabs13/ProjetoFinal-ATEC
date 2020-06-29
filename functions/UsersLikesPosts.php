<?php
  include 'conn.php';

  $PostID = $_POST['PostID'];

  $TotalUsers = mysqli_query($conn, "SELECT LikesPosts.UtilID, UtilPNome, UtilUNome, UtilFoto, UtilUser FROM LikesPosts LEFT JOIN Utilizadores ON LikesPosts.UtilID = Utilizadores.UtilID WHERE PostID = $PostID");

  if (mysqli_num_rows($TotalUsers) != 0)
  {
    while ($User = mysqli_fetch_array($TotalUsers))
    {
      echo '<a style="text-decoration: none; color: black;" href="perfil.php?&uname='.$User['UtilUser'].'&uid='.$User['UtilID'].'"> <div class="display_like_user">
              <div class="display_like_user_img">';
              if ($User['UtilFoto'] != null)
              {
                echo '<img src="imagens/Utilizadores/'.$User['UtilFoto'].'">';
              }
              else
              {
                echo '<img src="imagens/Icones/icons8-male-user-26.png">';
              }
          echo'</div>
              <div class="display_like_user_name">'.$User["UtilPNome"].' '.$User["UtilUNome"].'</div>
            </div> </a>';
    }
  }
  else {
    echo '<p class="userlikeComments_nocomments">Não tem likes.</p>';
  }


  include 'deconn.php';
?>
