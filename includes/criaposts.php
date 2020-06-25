<script src="javascript/scriptsposts.js"></script>

<body class="body_chat">
  <form action="functions/functions.php" method="POST" enctype="multipart/form-data">
    <div class="home_main"><!--ONDE VAO TAR OS POSTS-->
        <!--CRIACAO DO POST-->
        <div class="home_post_create">
            <div class="home_post_create_titulo">Insira o seu post...</div>
            <div class="home_post_create_container">

                <input class="home_post_create_container_texto" id="home_post_create_container_texto" name="tb_desc" placeholder="Escreva a sua descrição..." disabled>
                <div class="home_post_create_container_btns">
                  <input type="file" name="bt_carregarfoto" id="post_img_file" style="display:none;">
                  <input type="submit" name="bt_postarfoto" id="post_send_file" style="display:none;">
                  <div class="home_post_create_container_send" id="post_img"><i class="far fa-image"></i></div>
                  <div class="home_post_create_container_send" id="post_send"><i class="fas fa-paper-plane"></i></div>
                </div>

            </div>
        </div>
  </form>
  
<div class="home_post_example_border" id="home_post_example_border">
  <p class="home_post_example_border_text" id="home_post_example_border_text">Preview de Post</p>
        <!-- preview -->
    <div class="home_post_example" id="imgpreview" style="display: none;">
      <div class="modal_esquerda" id="modal_esquerda">
            <img src="" class="image_preview">
      </div>
      <div class="modal_direita">
        <div class="autor_modal_user">
          <div class="autor_modal_user_img">
            <img src="">
          </div>
          <div class="autor_modal_user_nome" id="modal_username">
            <div id="modal_username_text"> <?php echo @$_SESSION['CPNome'].' '.@$_SESSION['CUNome']; ?></div>
            <div class="modal_user_desc" id="modal_user_desc"></div>
          </div>
        </div>
        <hr class="modal_comentarios_separador"></hr>
        <div class="modal_direita_comentarios" id="modal_direita_comentarios">
          <div class="modal_comment_main_resposta">
            <div class="modal_comment_main">
              <div class="modal_comentario_userimg"><a><img src="imagens/Icones/icons8-male-user-26.png"></a></div>
              <div class="modal_total_buttons">
                <div class="modal_comentario_total">
                  <div class="modal_comentario_username">Nome Comentario</div>
                  <div class="modal_comentario_texto">
                    <p>Conteudo comentario</p>
                  </div>
                </div>
                <div class="modal_comentario_buttons">
                  <div id="btn_like"> <i class="fas fa-heart" style="color: #D24D57;"></i> </div>
                  <div id="btn_comment"><i class="fas fa-comment"></i></div>
                  <div id="btn_options"><i id="optionsbuttonI" class="fas fa-ellipsis-h optionsbuttonI"></i>
                  <div class="modal_hidden_options" id="modal_hidden_options_id" style="display: none;">
                    <div>Coiso</div>
                    <div>Idolatrar o Gabriel</div>
                    <div>Remover</div>
                    <div>Reportar</div>
                  </div>
                </div>
                <div class="modal_comentario_buttons_likes" id="modal_comentario_buttons_likes22"> <p>2 Likes</p></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="modal_comentarios_separador"></hr>
      <div class="autor_modal_info">
        <div class="autor_modal_info_btn" id="autor_modal_info_btn"><i class="fas fa-heart" id="likePostModal" style="color: rgb(210, 77, 87);"></i></div>
        <div class="autor_modal_info_btn2 autor_modal_info_btn"><i class="fas fa-share-alt"></i></div>
      </div>
      <div class="modal_comentarios_bottom">
        <input autocomplete="off" type="text" id="comentario_bottom" class="modal_user_comentario" placeholder="Adicione um comentário...">
        <div id="modal_user_sendbtn"> </div>
      </div>
      <div>
        <div class="close" ></div>
      </div>
    </div>
  </div>
</div>
</div>



</body>
