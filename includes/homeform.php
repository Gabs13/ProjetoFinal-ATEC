<body>



    <!--MODAL SLIDER DE IMAGENS-->
  <div class="modalGallery" id="modalperfilpost">
    
    <!--DIV DE DISPLAY DOS GOSTOS DO POST-->
    <div class="display_like_background" id="display_like_background" style='display:none;'>
      <div class="display_like_post">
        <div class="display_like_close_container">
          <span id="display_like_post_close">&times;</span>
        </div>
        <div class="display_like_post_scroll" id="display_like_post_scroll">
      </div>
    </div>
    <div class="display_post_finisher"></div>
  </div>
  <!--FINAL DIV DISPLAY LIKES-->
  <div class="arrow_1"></div>

  <div class="modal_content" id="modal_content">
    <div class="modal_esquerda" id="modal_esquerda"></div>
    <div class="modal_direita" id="modal_direita">
      <div class="autor_modal_user">
        <div class="autor_modal_user_img">
          <img id="autor_modal_user_img" src="">
        </div>
        <div class="autor_modal_user_nome" id="modal_username">
        <div id="modal_username_text"></div>
        <div class="modal_user_desc" id="modal_user_desc"></div>
      </div>
    </div>
    <hr class="modal_comentarios_separador"></hr>
    <div class="modal_direita_comentarios" id="modal_direita_comentarios"></div>
    <hr class="modal_comentarios_separador"></hr>
    <div class="autor_modal_info">
      <div class="autor_modal_info_btn" id="autor_modal_info_btn"></i></div>
      <div class="autor_modal_info_btn2 autor_modal_info_btn"><i class="fas fa-share-alt" onclick="btPartilhar()"></i></div>
      <div class="autor_modal_info_likes" id="autor_modal_info_likes"></div>
    </div>
    <div class="modal_comentarios_bottom">
      <input autocomplete="off" type="text" id="comentario_bottom" class="modal_user_comentario" placeholder="Adicione um comentário...">
      <div id="modal_user_sendbtn"> </div>
    </div>

  </div>

  <div class="close" id="closePerfil">&times;</div>

        </div>

<div class="arrow_2"></div>

</div>
<!--FINAL DA MODAL---------------------------------------------------------------------------------------------->

    <!--CRIACAO DE UM POST NA GALERIA-->
    <div class="newhome_container" id = "Container_Posts"><!--INICIO DA GALERIA-->
    <div class="home_welcome_notice">Veja o que os seus amigos estão a postar...</div>
    <?php
      getHome($_SESSION['UtilID']);
    ?>


    </div><!--Final do container1 dos posts-->



</body>
