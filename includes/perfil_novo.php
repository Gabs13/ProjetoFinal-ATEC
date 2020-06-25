<script src="javascript/scriptsperfil.js"></script>
<body>
    <!--Modal de seguidores-->
    <div class="modal_perfil" id="modal_perfil" style="display:none;">
        <div class="modal_perfil_container">
            <div class="modal_perfil_container_nome">
                <div class="modal_perfil_container_title">Seguidores</div>
                <span class="perfil_modal_close" id="perfil_modal_close">X</span>
            </div>
            <div class="modal_perfil_container_items">
                <div class="modal_perfil_container_items_img"><a><img src="imagens/Utilizadores/gabriel.jpg"></a></div>
                <div class="modal_perfil_container_items_nome">
                   <div class="modal_perfil_container_items_nome_name">Gabigol</div>
                   <div class="modal_perfil_container_items_nome_username">Gabriel Cosme</div>
                </div>
            </div>
            <div class="modal_perfil_container_final"></div>
        </div>

    </div>
    <!--FINAL MODAL PERFIL-->

    <!--MODAL SLIDER DE IMAGENS-->
    <div class="modalGallery" id="modalperfilpost" style="display:none;">
        <!--DIV DE DISPLAY DOS GOSTOS DO POST-->
        <div class="display_like_background" id="display_like_background" style='display:none;'>
            <div class="display_like_post">
                <div class="display_like_close_container">
                    <span id="display_perfil_post_close">&times;</span>
                </div>
                <div class="display_like_post_scroll" id="display_like_post_scroll"></div>
            </div>
            <div class="display_post_finisher"></div>
        </div>
        <!--FINAL DIV DISPLAY LIKES-->


        <div class="modal_content">
            <div class="modal_esquerda" id="modal_esquerda"></div>
            <div class="modal_direita">
                <div class="autor_modal_user">
                <div class="autor_modal_user_img">
                    <img src="">
                </div>
                <div class="autor_modal_user_nome" id="modal_username">
                    <img src="" alt="">
                    <div id="modal_username_text"></div>
                    <div class="modal_user_desc" id="modal_user_desc"></div>
                </div>
            </div>
            <hr class="modal_comentarios_separador"></hr>
            <div class="modal_direita_comentarios" id="modal_direita_comentarios"></div>
            <hr class="modal_comentarios_separador"></hr>
            <div class="autor_modal_info">
                <div class="autor_modal_info_btn" id="autor_modal_info_btn"></i></div>
                <div class="autor_modal_info_btn2 autor_modal_info_btn"><i class="fas fa-share-alt"></i></div>
                <div class="autor_modal_info_likes" id="autor_modal_info_likes">20 likes</div>
            </div>
            <div class="modal_comentarios_bottom">
                <input autocomplete="off" type="text" id="comentario_bottom" class="modal_user_comentario" placeholder="Adicione um comentário...">
            <div id="modal_user_sendbtn"> </div>
        </div>

    </div>

    <div class="close" id="closePerfil">&times;</div>

</div>
</div>
        <!--FINAL DA MODAL---------------------------------------------------------------------------------------------->


    <!--FINAL DA MODAL DO POST-->

    <div class="perfil_main_container">
        <!--parte do container com as informacoes do utilizador-->
        <div class="perfil_utilizador">
            
            <div class="perfil_utilizador_imagem">
              <div class="img_edit" id="img_edit">
                <i class="fas fa-camera"></i>
              </div>
              <img class="perfil_utilizador_imagem_img" id="perfil_utilizador_imagem_img" src="imagens/Utilizadores/gabriel.jpg">

            </div>

            <div class="perfil_utilizador_container">
                <div class="perfil_utilizador_edit_info">
                    <div class="perfil_utilizador_info">
                        <div class="perfil_utilizador_info_nome">Gabriel Cosme</div>
                        <div class="perfil_utilizador_info_username">@Gabigol</div>
                        <div class="perfil_utilizador_info_descricao">Gosto muito de arte oh meu deus xisdeh</div>
                    </div>
                    <div class="perfil_utilizador_edit">
                        <?php

                        if (@$_GET['uid'] == $_SESSION['UtilID'])
                        {
                          echo '<div class="perfil_utilizador_edit_text">Editar <i class="far fa-edit"></i></div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="perfil_utilizador_info_btns">
                    <div class="perfil_utilizador_info_btns_seguidores" id="perfil_utilizador_info_btns_seguidores">
                        <div class="perfil_utilizador_info_btns_seguidores_nr">3000</div>
                        <div class="perfil_utilizador_info_btns_seguidores_text">Seguidores</div>
                    </div>
                    <div class="perfil_utilizador_info_btns_aseguir" id="perfil_utilizador_info_btns_aseguir">
                        <div class="perfil_utilizador_info_btns_seguidores_nr">45</div>
                        <div class="perfil_utilizador_info_btns_seguidores_text">A Seguir</div>
                    </div>
                    <div class="perfil_utilizador_info_btns_fotos" id="perfil_utilizador_info_btns_fotos">
                        <div class="perfil_utilizador_info_btns_seguidores_nr">20</div>
                        <div class="perfil_utilizador_info_btns_seguidores_text">Posts</div>
                    </div>
                </div>
            </div>
        </div>



        <!--parte das fotos inseridas pelo utilizador-->
        <div class="perfil_galeria">

            <div class="perfil_galeria_post" id="perfil_galeria_post">
                <a><img src="imagens\posts\5ef26bf8c301b3.00058452.jpg"></a>
            </div>
            <div class="perfil_galeria_post" id="perfil_galeria_post">
                <a><img src="imagens\posts\5ef26bf8c301b3.00058452.jpg"></a>
            </div>
            <div class="perfil_galeria_post" id="perfil_galeria_post">
                <a><img src="imagens\posts\5ef26bf8c301b3.00058452.jpg"></a>
            </div>


        </div>






    </div>

</body>
