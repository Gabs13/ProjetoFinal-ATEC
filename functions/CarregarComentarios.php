<?php
  include 'conn.php';

  $PostID = $_POST['PostID'];

  $Comments = mysqli_query($conn, "SELECT * FROM Comentarios WHERE PostID = $PostID");

  if (mysqli_num_rows($Comments) > 0)
  {
    while($Comment = mysqli_fetch_array($Comments))
    {
      $detailsComment = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Utilizadores WHERE UtilID = $Comment[UtilID]"));


      echo '<div class="modal_comment_main_resposta">
              <div class="modal_comment_main">
                  <div class="modal_comentario_userimg"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                  <div class="modal_total_buttons">
                    <div class="modal_comentario_total">
                      <div class="modal_comentario_username">'.$detailsComment["UtilPNome"].' '.$detailsComment["UtilUNome"].'</div>
                        <div class="modal_comentario_texto">
                          '.$Comment["Mensagem"].'
                        </div>
                   </div>
                    <div class="modal_comentario_buttons">
                        <div id="btn_like"><i class="fas fa-heart"></i></div>
                        <div id="btn_comment"><i class="fas fa-comment"></i></div>
                        <div id="btn_options"><i id ="optionsbuttonI" class="fas fa-ellipsis-h optionsbuttonI"></i>
                          <div class="modal_hidden_options" id="modal_hidden_options_id" style="display: none;">
                            <div>Coiso</div>
                            <div>Idolatrar o '.$detailsComment["UtilPNome"].'</div>
                            <div>sdcsdfsd</div>
                            <div>Reportar</div>
                          </div>
                        </div>


                        <div class="modal_comentario_buttons_likes">320 Likes</div>
                    </div>
              </div>
            </div>
            </div>';
    }
    echo '<script src="javascript/scriptscomments.js"></script>';
  }
  else
  {
    echo '<p>Não tem comentários</p>';
  }

  include 'deconn.php';

?>
