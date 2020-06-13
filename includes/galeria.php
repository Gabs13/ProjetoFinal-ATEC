<html>
<body>
    <div class="galery_title">GALERIAS</div>

        <!--MODAL SLIDER DE IMAGENS-->
        <div class="modalGallery" id="modal">

<div class="arrow_1"></div>

<div class="modal_content">

    <div class="modal_esquerda">
      <img src="Imagens/quadro2.jpg">
    </div>

    <!--DIV DE DISPLAY DOS GOSTOS DO POST-->
    <div class="display_like_background">

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




    <div class="modal_direita">
      <div class="autor_modal_user">
        <div class="autor_modal_user_img">
          <img src="">
        </div>
        <div class="autor_modal_user_nome" id="modal_username">

          <!--<img src="" alt="">-->
          <div id="modal_username_text">Armando Nunes</div>
          <div class="modal_user_desc">Imagem da cidade do Armando</div>

        </div>
      </div>
      <hr class="modal_comentarios_separador"></hr>
      <div class="modal_direita_comentarios">

      <div class="modal_comment_main_resposta">
        <div class="modal_comment_main">
            <div class="modal_comentario_userimg"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
            <div class="modal_total_buttons">
              <div class="modal_comentario_total">
                <div class="modal_comentario_username">Amigo do Armando</div>
                  <div class="modal_comentario_texto">
                    Muito giro amigo Armando.
                  </div>
              </div>
              <div class="modal_comentario_buttons">
                  <div id="btn_like"><i class="fas fa-heart"></i></div>
                  <div id="btn_comment"><i class="fas fa-comment"></i></div>
                  <div id="btn_options"><i id ="optionsbuttonI" class="fas fa-ellipsis-h"></i>
                    <div class="modal_hidden_options">
                      <div>Coiso</div>
                      <div>Idolatrar o to</div>
                      <div>sdcsdfsd</div>
                      <div>Reportar</div>
                    </div>
                  </div>


                  <div class="modal_comentario_buttons_likes">320 Likes</div>
              </div>
            </div>
        </div>
          <!--FIM DO COMENTÁRIO DO UTILIZADOR-->
             <!--REPOSTA AO COMENTARIO/ONCLICK DO BOTAO COMENTARIO-->
        <div class="modal_comentario_reply">
              <div class="modal_comentario_reply_imagem"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
              <div class="modal_comentario_reply_content">
                <div class="modal_comentario_reply_content_name">Tó Carocho</div>
                <div class="modal_comentario_reply_content_main">
                  <div class="modal_comentario_reply_content_texto">Eu era toxicoindependente</div>
                  <div class="modal_comentario_reply_content_like"><i class="fas fa-heart"></i></div>
                </div>
              </div>
        </div>
        <!--ADICIONAR UM COMENTARIO NA MODAL-->
        <div class="modal_comentario_resposta">
          <div class="modal_comentario_resposta_imagem"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
          <div class="modal_comentario_resposta_texto">
            <input type="text" placeholder="Adicione um comentário..." >
            <i class="fas fa-location-arrow"></i>
          </div>
        </div>
      </div>

      </div>
      <hr class="modal_comentarios_separador"></hr>
      <div class="autor_modal_info">
        <div class="autor_modal_info_btn"><a><img src=".//Imagens/Icones/icons8-love-24.png"></a></div>
        <div class="autor_modal_info_btn2 autor_modal_info_btn"><a><img src=".//Imagens/Icones/icons8-share-24.png"></a></div>
      </div>
      <div class="modal_comentarios_bottom">
        <input type="text" id="comentario_bottom" class="modal_user_comentario" placeholder="Adicione um comentário...">
        <div id="modal_user_sendbtn"> <i class="fas fa-location-arrow"></i> </div>
      </div>

    </div>

    <div class="close" id="close" >&times;</div>

</div>

<div class="arrow_2"></div>

</div>
<!--FINAL DA MODAL---------------------------------------------------------------------------------------------->

    <!--CRIACAO DE UM POST NA GALERIA-->
    <div class="galery_container"><!--INICIO DA GALERIA-->
    <?php
      getGaleria();
    ?>


    </div><!--Final do container1 dos posts-->
</body>
</html>
