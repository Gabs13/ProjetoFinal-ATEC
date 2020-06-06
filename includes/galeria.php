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
    <div class="modal_direita">
      <div class="autor_modal_user">
        <div class="autor_modal_user_img">
          <img src="">
        </div>
        <div class="autor_modal_user_nome" id="modal_username">

          <img src="" alt="">
          Armando Nunes
          <!-- <?php
              include 'connections/conn.php';

              $result = mysqli_query($conn, "SELECT user_nome from user where user_id=1");

              if($user_dados = mysqli_fetch_array($result))
              {
                  echo '<div>'.$user_dados["user_nome"].'</div>';
              }
              
              include 'connections/deconn.php';
            ?> -->
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
                  <div><a><img src="Imagens/Icones/icons8-love-24.png"></a></div>
                  <div id="btn_comment"><a><img src="Imagens/Icones/icons8-comments-24.png"></a></div>
                  <div><a><img src="Imagens/Icones/icons8-more-24.png"></a></div>
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
                  <div class="modal_comentario_reply_content_texto">Eu era toxicodependente</div>
                  <div class="modal_comentario_reply_content_like"><a><img src="Imagens/Icones/icons8-love-24.png"></a></div>
                </div>
              </div>
        </div>     
        <!--ADICIONAR UM COMENTARIO NA MODAL-->     
        <div class="modal_comentario_resposta">
            <div class="modal_comentario_resposta_imagem"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
            <input type="text" placeholder="Adicione um comentário..." class="modal_comentario_resposta_texto"> 
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
<!--FINAL DA MODAL-->


    <!--CRIACAO DE UM POST NA GALERIA-->
    <div class="galery_container"><!--INICIO DA GALERIA-->

        <div class="collection_container_item">
            <div class="collection_container_name" id="galerydisplay">

                <div class="text_gallery">
                    <div class="collection_container_name_info2 collection_container_name_info">Fábio Santos</div>
                    <div class="collection_container_info_bot">
                        <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-love-24.png"></div>
                        <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-comments-24.png"></div>
                        <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-share-24.png"></div>
                </div>
                </div>
            </div>
            <div class="collection_container_social">
                <div class="collection_social_btn">"Animais"</div>
                <div class="collection_social_btn">Pintura</div>

            </div>
        </div><!--fim da div do post-->


        <!--CRIACAO DE UM POST NA GALERIA-->

        <div class="collection_container_item">
            <div class="collection_container_name" id="galerydisplay2">
            <!--MODAL SLIDER DE IMAGENS-->

                <div class="text_gallery">
                    <div class="collection_container_name_info2 collection_container_name_info">Fábio Santos</div>
                    <div class="collection_container_info_bot">
                        <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-love-24.png"></div>
                        <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-comments-24.png"></div>
                        <div class="collection_container_name_info"><img src=".//Imagens/Icones/icons8-share-24.png"></div>
                </div>
                </div>
            </div>
            <div class="collection_container_social">
                <div class="collection_social_btn">"Animais"</div>
                <div class="collection_social_btn">Pintura</div>

            </div>

    </div><!--Final do container dos posts-->
</body>
</html>
