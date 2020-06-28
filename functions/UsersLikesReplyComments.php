<?php
  include 'conn.php';

  $ComentarioID = $_POST['ComentarioID'];

  $TotalUsers = mysqli_query($conn, "SELECT LikesReplyComentarios.UtilID, UtilPNome, UtilUNome FROM LikesReplyComentarios LEFT JOIN Utilizadores ON LikesReplyComentarios.UtilID = Utilizadores.UtilID WHERE ReplyComentarioID = $ComentarioID");

  if (mysqli_num_rows($TotalUsers) != 0)
  {
    while ($User = mysqli_fetch_array($TotalUsers))
    {
      echo '<div class="display_like_user">
              <div class="display_like_user_img"><a><img src="imagens/Icones/icons8-male-user-26.png"></a></div>
              <div class="display_like_user_name">'.$User["UtilPNome"].' '.$User["UtilUNome"].'</div>
            </div>';
    }
  }
  else {
    echo '<p class="userlikeComments_nocomments">Não tem likes.</p>';
  }

  include 'deconn.php';
?>
