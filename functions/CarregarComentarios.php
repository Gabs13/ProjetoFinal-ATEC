<?php
  include 'conn.php';

  session_start();

  $PostID = $_POST['PostID'];

  $Comments = mysqli_query($conn, "SELECT * FROM Comentarios WHERE PostID = $PostID");

  $Post = mysqli_query($conn, "SELECT * FROM Posts WHERE PostID = $PostID");

  $PostInfo = mysqli_fetch_array($Post);

  if (mysqli_num_rows($Comments) > 0)
  {
    while($Comment = mysqli_fetch_array($Comments))
    {
      $detailsComment = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Utilizadores WHERE UtilID = $Comment[UtilID]"));

      $LikeComment = mysqli_query($conn, "SELECT LikeCommentID, ComentarioID, UtilID FROM LikesComentarios WHERE ComentarioID = $Comment[ComentarioID] AND UtilID = $_SESSION[UtilID]" );

      $TotalLikes = mysqli_query($conn, "SELECT LikeCommentID FROM LikesComentarios WHERE ComentarioID = $Comment[ComentarioID]");

      echo '<div class="modal_comment_main_resposta">
              <div class="modal_comment_main">
                  <div class="modal_comentario_userimg"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                  <div class="modal_total_buttons">
                    <div class="modal_comentario_total">
                      <div class="modal_comentario_username">'.$detailsComment["UtilPNome"].' '.$detailsComment["UtilUNome"].'</div>
                        <div class="modal_comentario_texto">
                          <p>'.$Comment["Mensagem"].'</p>
                        </div>
                   </div>
                    <div class="modal_comentario_buttons">
                    <div id="btn_like" id="btn_like">';
      if (mysqli_num_rows($LikeComment) == 1)
      {
        echo '          <i class="fas fa-heart" style="color: #D24D57;" id="Comment'.$Comment["ComentarioID"].'" onclick="likeComment('.$Comment["ComentarioID"].')"></i>';
      }
      else
      {
        echo '          <i class="fas fa-heart" id="Comment'.$Comment["ComentarioID"].'" onclick="likeComment('.$Comment["ComentarioID"].')"></i>';
      }
      echo '            </div>
                        <div id="btn_comment"><i class="fas fa-comment"></i></div>
                        <div id="btn_options"><i id ="optionsbuttonI" class="fas fa-ellipsis-h optionsbuttonI"></i>
                          <div class="modal_hidden_options" id="modal_hidden_options_id" style="display: none;">
                            <div>Coiso</div>
                            <div>Idolatrar o '.$detailsComment["UtilPNome"].'</div>';
                            if ($Comment["UtilID"] == $_SESSION["UtilID"] || $PostInfo["UtilID"] == $_SESSION["UtilID"])
                            {
                              echo '<div onclick="removeComment('.$Comment["ComentarioID"].');"> Remover </div>';
                            }
                            echo '<div>Reportar</div>
                          </div>
                        </div>
<<<<<<< HEAD
                        <div class="modal_comentario_buttons_likes" id="modal_comentario_buttons_likes'.$Comment["ComentarioID"].'">'.mysqli_num_rows($TotalLikes).' Likes</div>
=======


                        <div class="modal_comentario_buttons_likes" id="modal_comentario_buttons_likes">320 Likes
                        </div>
                    </div>
              </div>
            </div>
            </div>
            
            <!--DIV DE DISPLAY DOS GOSTOS DO POST-->
                          <div class="display_like_background" id="display_like_background">
                      
                            <div class="display_like_post">
                              <div class="display_like_close_container">
                                <span id="display_like_post_close">&times;</span>
                              </div>
                              <div class="display_like_user">
                                <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                                <div class="display_like_user_name">Armando Nunes</div>
                              </div>
                              <div class="display_like_user">
                                <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                                <div class="display_like_user_name">Ricardo Machado</div>
                              </div>
                              <div class="display_like_user">
                                <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                                <div class="display_like_user_name">Ricardo Silva</div>
                              </div>
                            </div>
                            <div class="display_post_finisher"></div>
                          </div>
                          <!--FINAL DIV DISPLAY LIKES-->
<<<<<<< HEAD
                        </div>
>>>>>>> e532478f5550139fde5c998c1b1005b6b73dfd90
                    </div>
              </div>
            </div>
            </div>';
=======
            
            
            ';
>>>>>>> dbcdde7f8e62dd9ec4219dd4bbdbcabe354cc5b8
    }
    echo '<script src="javascript/scriptscomments.js"></script>';
  }
  else
  {
    echo '<p class="modal_comentario_empty">Não tem comentários.</p>';
  }

  include 'deconn.php';

?>
