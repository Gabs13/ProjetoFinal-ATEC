<?php
  include 'conn.php';

  $ComentarioID = $_POST['ComentarioID'];

  $TotalUsers = mysqli_query($conn, "SELECT LikesComentarios.UtilID, UtilPNome, UtilUNome, UtilFoto, UtilUser FROM LikesComentarios LEFT JOIN Utilizadores ON LikesComentarios.UtilID = Utilizadores.UtilID WHERE ComentarioID = $ComentarioID");

  if (mysqli_num_rows($TotalUsers) != 0)
  {
    while ($User = mysqli_fetch_array($TotalUsers))
    {
      echo ' <a style="text-decoration: none; color: black;" href="perfil.php?&uname='.$User['UtilUser'].'&uid='.$User['UtilID'].'"><div class="display_like_user">
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
            </div>';
    }
  }
  else {
    echo '<p class="userlikeComments_nocomments">Não tem likes.</p>';
  }

  include 'deconn.php';
?>
