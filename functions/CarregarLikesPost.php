<?php
  include 'conn.php';

  $PostID = $_POST['PostID'];

  $Likes = mysqli_query($conn, "SELECT LikePostID, PostID, UtilID, DataLike FROM LikesPosts WHERE PostID = $PostID");

  echo '<p onclick="totalUsersLikesPosts('.$PostID.')">'.mysqli_num_rows($Likes).' Likes</p>';

  include 'deconn.php';
?>
