<?php
  include 'conn.php';
  
  $PostID = $_POST['PostID'];

  $TotalUsers = mysqli_query($conn, "SELECT LikesPosts.UtilID, UtilPNome, UtilUNome FROM LikesPosts LEFT JOIN Utilizadores ON LikesPosts.UtilID = Utilizadores.UtilID WHERE PostID = $PostID");

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
