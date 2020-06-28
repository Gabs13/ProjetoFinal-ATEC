<?php
  include 'conn.php';

  session_start();

  $PostID = $_POST['PostID'];

  $Comments = mysqli_query($conn, "SELECT ComentarioID, PostID, UtilID, Mensagem, DataMsg FROM Comentarios WHERE PostID = $PostID");

  $Post = mysqli_query($conn, "SELECT PostID, PubDesc, DataPublicacao, UtilID FROM Posts WHERE PostID = $PostID");

  $PostInfo = mysqli_fetch_array($Post);

  if (mysqli_num_rows($Comments) > 0)
  {
    while($Comment = mysqli_fetch_array($Comments))
    {
      $detailsComment = mysqli_fetch_array(mysqli_query($conn, "SELECT UtilID, UtilPNome, UtilUNome, UtilUser, UtilFoto FROM Utilizadores WHERE UtilID = $Comment[UtilID]"));

      $LikeComment = mysqli_query($conn, "SELECT LikeCommentID, ComentarioID, UtilID FROM LikesComentarios WHERE ComentarioID = $Comment[ComentarioID] AND UtilID = $_SESSION[UtilID]" );

      $TotalLikes = mysqli_query($conn, "SELECT LikeCommentID FROM LikesComentarios WHERE ComentarioID = $Comment[ComentarioID]");

      echo '<div class="modal_comment_main_resposta">
              <div class="modal_comment_main">';
              if ($detailsComment['UtilFoto'] != null)
              {
                echo '<div class="modal_comentario_reply_imagem"> <a href="perfil.php?&uname='.$detailsComment['UtilUser'].'&uid='.$detailsComment['UtilID'].'"> <img src="imagens/Utilizadores/'.$detailsComment['UtilFoto'].'"> </a> </div>';
              }
              else
              {
                echo '<div class="modal_comentario_reply_imagem"> <a href="perfil.php?&uname='.$detailsComment['UtilUser'].'&uid='.$detailsComment['UtilID'].'"> <img src="imagens/Icones/icons8-male-user-26.png"> </a> </div>';
              }
              echo'<div class="modal_total_buttons">
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
        echo '         <i class="fas fa-heart" style="color: #D24D57;" id="Comment'.$Comment["ComentarioID"].'" onclick="likeComment('.$Comment["ComentarioID"].')"></i>';
      }
      else
      {
        echo '          <i class="fas fa-heart" id="Comment'.$Comment["ComentarioID"].'" onclick="likeComment('.$Comment["ComentarioID"].')"></i>';
      }
      echo '            </div>
                        <div id="btn_comment"><i onclick="replyComment('.$Comment["ComentarioID"].')" class="fas fa-comment"></i></div>
                        <div id="btn_options"><i id ="optionsbuttonI" class="fas fa-ellipsis-h optionsbuttonI"></i>
                          <div class="modal_hidden_options" id="modal_hidden_options_id" style="display: none;">';

                            if ($Comment["UtilID"] == $_SESSION["UtilID"] || $PostInfo["UtilID"] == $_SESSION["UtilID"])
                            {
                              echo '<div onclick="removeComment('.$Comment["ComentarioID"].');"> Remover </div>';
                            }
                            echo '<div>Reportar</div>
                          </div>
                        </div>
                        <div class="modal_comentario_buttons_likes" id="modal_comentario_buttons_likes'.$Comment["ComentarioID"].'"> <p onclick="totalUsersLikes('.$Comment["ComentarioID"].')">'.mysqli_num_rows($TotalLikes).' Likes </p>
                        </div>
                    </div>
              </div>
            </div>
            </div>


                        </div>
                    </div>
              </div>
            </div>
            </div>';

      $detailsReplyComment = mysqli_query($conn, "SELECT ReplyComentarioID, UtilID, ComentarioID, Mensagem FROM ReplyComentarios WHERE ComentarioID = $Comment[ComentarioID]");

      if(mysqli_num_rows($detailsReplyComment) > 0)
      {
        while($ReplyComment = mysqli_fetch_array($detailsReplyComment))
        {
          $detailsUserReply = mysqli_fetch_array(mysqli_query($conn, "SELECT UtilID, UtilPNome, UtilUNome, UtilUser, UtilFoto FROM Utilizadores WHERE UtilID = $ReplyComment[UtilID]"));

          $LikeReplyComment = mysqli_query($conn, "SELECT LikeReplyComentarioID, ReplyComentarioID, UtilID FROM LikesReplyComentarios WHERE ReplyComentarioID = $ReplyComment[ReplyComentarioID] AND UtilID = $_SESSION[UtilID]" );

          $TotalReplyLikes = mysqli_query($conn, "SELECT LikeReplyComentarioID FROM LikesReplyComentarios WHERE ReplyComentarioID = $ReplyComment[ReplyComentarioID]");

          echo '<!--REPOSTA AO COMENTARIO/ONCLICK DO BOTAO COMENTARIO-->
          <div class="modal_comentario_reply">';
          if ($detailsUserReply['UtilFoto'] != null)
          {
            echo '<div class="modal_comentario_reply_imagem"> <a href="perfil.php?&uname='.$detailsUserReply['UtilUser'].'&uid='.$detailsUserReply['UtilID'].'"> <img src="imagens/Utilizadores/'.$detailsUserReply['UtilFoto'].'"> </a> </div>';
          }
          else
          {
            echo '<div class="modal_comentario_reply_imagem"> <a href="perfil.php?&uname='.$detailsUserReply['UtilUser'].'&uid='.$detailsUserReply['UtilID'].'"> <img src="imagens/Icones/icons8-male-user-26.png"> </a> </div>';
          }

          echo'<div class="modal_comentario_conteudo">
              <div class="modal_comentario_reply_content_btns">
                <div class="modal_comentario_reply_content">
                  <div class="modal_comentario_reply_content_name">'.$detailsUserReply["UtilPNome"].' '.$detailsUserReply["UtilUNome"].'</div>
                  <div class="modal_comentario_reply_content_main">
                    <div class="modal_comentario_reply_content_texto">'.$ReplyComment["Mensagem"].'</div>
                  </div>
                </div>
              </div>
              <div class="modal_comentario_reply_btns">
                <div>';
                if (mysqli_num_rows($LikeReplyComment) == 1)
                {
                  echo '         <i class="fas fa-heart" style="color: #D24D57;" id="ReplyComment'.$ReplyComment["ReplyComentarioID"].'" onclick="likeReplyComment('.$ReplyComment["ReplyComentarioID"].')"></i>';
                }
                else
                {
                  echo '          <i class="fas fa-heart" id="ReplyComment'.$ReplyComment["ReplyComentarioID"].'" onclick="likeReplyComment('.$ReplyComment["ReplyComentarioID"].')"></i>';
                }

           echo'</div>
                <div id="btn_options"><i id ="optionsbuttonI" class="fas fa-ellipsis-h optionsbuttonI"></i>
                  <div class="modal_hidden_options" id="modal_hidden_options_id" style="display: none;">';

                    if ($Comment["UtilID"] == $_SESSION["UtilID"] || $PostInfo["UtilID"] == $_SESSION["UtilID"])
                    {
                      echo '<div onclick="removeComment('.$Comment["ComentarioID"].');"> Remover </div>';
                    }
                    echo '<div>Reportar</div>
                  </div>
                </div>
                <div class="modal_comentario_reply_btns_likes" id="modal_comentario_reply_btns_likes'.$ReplyComment["ReplyComentarioID"].'"> <p onclick="totalUsersReplyLikes('.$ReplyComment["ReplyComentarioID"].')">'.mysqli_num_rows($TotalReplyLikes).' Likes</p> </div>
              </div>
            </div>
          </div>';
        }
      }

      $replyComentarios = mysqli_query($conn, "SELECT ReplyComentarioID, UtilID, ComentarioID, Mensagem FROM ReplyComentarios WHERE ComentarioID = $Comment[ComentarioID]");

    }
  }
  else
  {
    echo '<p class="modal_comentario_empty">Não tem comentários.</p>';
  }

  echo '<script src="javascript/scriptscomments.js"></script>';

  include 'deconn.php';

?>
