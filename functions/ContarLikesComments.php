<?php
  include 'conn.php';

  session_start();

  $ComentarioID = $_POST['ComentarioID'];

  $TotalLikes = mysqli_query($conn, "SELECT LikeCommentID FROM LikesComentarios WHERE ComentarioID = $ComentarioID");

  echo '<p onclick="totalUsersLikes('.$ComentarioID.')">'.mysqli_num_rows($TotalLikes).' Likes </p>';

  include 'deconn.php';
?>
