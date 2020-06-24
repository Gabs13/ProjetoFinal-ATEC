<script src="javascript/scriptshome.js"></script>
<body>
     <div class="resultadoPesquisa_back"><i><img src="Imagens/logotipo/artifex2.png"></i></div><!--SIMBOLO ARTIFEX -->
    <!-- Aparecer criacao de post(includes) -->
  
    <div class="casa_create_include" id="casa_create_include">
        <?php 
            include 'criaposts.php';
        ?>
    </div>

   
    
    <div class="casa_main" id="casa_main">
        <div class="casa_create_post" id="casa_create_post">
            <p>Crie o seu post aqui</p>
            <i class="far fa-plus-square"></i>
        </div>
        <!--SEPARADOR DO CRIAR POST E DOS POSTS CRIADOS-->
        <div class="casa_main_seperator"></div>

        <!--CRIACAO DOS POSTS-->
        <div class="casa_main_post">
            <div class="home_post_example" id="imgpreview" style="display: flex;">
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
                            <div class="modal_comentario_userimg"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
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
                                <div class="modal_comentario_buttons_likes" id="modal_comentario_buttons_likes22"> <p>2 Likes</p>
                                </div>
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
                        
        </div><!--FINAL DO POST-->
       

        <div class="casa_main_post">
            <div class="home_post_example" id="imgpreview" style="display: flex;">
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
                            <div class="modal_comentario_userimg"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
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
                                <div class="modal_comentario_buttons_likes" id="modal_comentario_buttons_likes22"> <p>2 Likes</p>
                                </div>
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
                        
        </div><!--FINAL DO POST-->






    </div><!--FINAL DA DIV MAIN DO BODY HOME--> 
</body>