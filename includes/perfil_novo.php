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
                <div class="modal_perfil_container_items_img"><a><img src="Imagens/Utilizadores/gabriel.jpg"></a></div>
                <div class="modal_perfil_container_items_nome">
                   <div class="modal_perfil_container_items_nome_name">Gabigol</div>
                   <div class="modal_perfil_container_items_nome_username">Gabriel Cosme</div>
                </div>
            </div>
            <div class="modal_perfil_container_final"></div>
        </div>
        
    </div>
    <!--FINAL MODAL PERFIL-->

    <div class="perfil_main_container">
        <!--parte do container com as informacoes do utilizador-->
        <div class="perfil_utilizador">
            <div class="perfil_utilizador_imagem">
                <a><i class="fas fa-camera img_edit"></i><img src="Imagens/Utilizadores/gabriel.jpg"></a>
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

            <div class="perfil_galeria_post">
                <a><img src="Imagens\posts\5ef26bf8c301b3.00058452.jpg"></a>
            </div>
            <div class="perfil_galeria_post">
                <a><img src="Imagens\posts\5ef26bf8c301b3.00058452.jpg"></a>
            </div>
            <div class="perfil_galeria_post">
                <a><img src="Imagens\posts\5ef26bf8c301b3.00058452.jpg"></a>
            </div>


        </div>






    </div>

</body>
