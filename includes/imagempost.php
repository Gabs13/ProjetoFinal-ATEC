<script>
  var myvar = "<?php echo $_SESSION['UtilID'] ?>";
  console.log(myvar);
</script>
  
<!--MODAL SLIDER DE IMAGENS-->
<div class="imagempost_display" >
    <div class="resultadoPesquisa_back"><i><img src="Imagens/logotipo/artifex2.png"></i></div>
        <!--DIV DE DISPLAY DOS GOSTOS DO POST-->
        <div class="display_like_background" id="display_like_background" style='display:none;'>
            <div class="display_like_post">
                <div class="display_like_close_container">
                    <span id="display_like_post_close">&times;</span>
                </div>
                <div class="display_like_post_scroll">
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
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                    <div class="display_like_user">
                    <div class="display_like_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                    <div class="display_like_user_name">r Silva </div>
                    </div>
                </div>
            </div>
        <div class="display_post_finisher"></div>
        </div>
        <!--FINAL DIV DISPLAY LIKES-->
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
                        <div id="modal_username_text">Armando Nunes</div>
                        <div class="modal_user_desc" id="modal_user_desc"></div>
                    </div>
                </div>
                <hr class="modal_comentarios_separador"></hr>
                <div class="modal_direita_comentarios" id="modal_direita_comentarios"></div>
                <hr class="modal_comentarios_separador"></hr>
                <div class="autor_modal_info">
                    <div class="autor_modal_info_btn" id="autor_modal_info_btn"></i></div>
                    <div class="autor_modal_info_btn2 autor_modal_info_btn"><i class="fas fa-share-alt"></i></div>
                </div>
                <div class="modal_comentarios_bottom">
                    <input autocomplete="off" type="text" id="comentario_bottom" class="modal_user_comentario" placeholder="Adicione um comentário...">
                    <div id="modal_user_sendbtn"> </div>
                </div>
            </div>
            <div class="close" ></div>
        </div>

</div>
<!--FINAL DA MODAL---------------------------------------------------------------------------------------------->

</body>