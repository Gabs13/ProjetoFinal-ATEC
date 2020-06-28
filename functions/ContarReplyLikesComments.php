<?php
  include 'conn.php';

  session_start();

  $ComentarioID = $_POST['ComentarioID'];

  $TotalLikes = mysqli_query($conn, "SELECT ReplyComentarioID FROM LikesReplyComentarios WHERE ReplyComentarioID = $ComentarioID");

  echo '<p onclick="totalUsersReplyLikes('.$ComentarioID.')">'.mysqli_num_rows($TotalLikes).' Likes </p>';

  include 'deconn.php';
?>
