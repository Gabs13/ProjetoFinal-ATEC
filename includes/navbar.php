<body>
  <div class='menu'>
    <span class='toggle' id='toggle'>
      <img id="img_navbar" width="65" height="65">
    </span>


    <!------------------------------------INICIO DO MODAL DE CRIAR POST--------------------------------------->
    <div class="modal_criar_post" id="modal_criar_post" style="display:none">
      <span id="modal_criar_post_close">&times;</span>
      <form action="functions/functions.php" method="POST" enctype="multipart/form-data" id="form_preview">
        <div class="home_main" id="home_main"><!--ONDE VAO TAR OS POSTS-->
          <!--CRIACAO DO POST-->
          <div class="home_post_create">
            <div class="home_post_create_titulo">Insira o seu post...</div>
            <div class="home_post_create_container">
              <input class="home_post_create_container_texto" id="home_post_create_container_texto_1" name="tb_desc_1" placeholder="Escreva a sua descrição..." disabled>
              <div class="home_post_create_container_btns">

                <input type="hidden" name="link" value="<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; echo $actual_link; ?>">
                <input type="file" name="bt_carregarfoto_1" id="post_img_file_1" style="display:none;">
                <input type="submit" name="bt_postarfoto" id="post_send_file_2" style="display:none;">
                <div class="home_post_create_container_send" id="post_img"><i class="far fa-image"></i></div>
                <div class="home_post_create_container_send" id="post_send"><i class="fas fa-paper-plane"></i></div>
              </div>

            </div>
          </div>
        </div>
      </form>

      <div class="home_post_example_border" id="home_post_example_border">
        <p class="home_post_example_border_text" id="home_post_example_border_text">Preview de Post</p>
        <!-- preview -->
        <div class="home_post_example" id="home_post_example">
          <div class="modal_esquerda" id="modal_esquerda_preview">
            <img src="" class="image_preview" id="imgpreview">
          </div>
          <div class="modal_direita">
            <div class="autor_modal_user">
              <div class="autor_modal_user_img">
                <img src="">
              </div>
              <div class="autor_modal_user_nome" >
                <div> <?php echo @$_SESSION['CPNome'].' '.@$_SESSION['CUNome']; ?></div>
                <div class="modal_user_desc" id="modal_user_desc_preview"></div>
              </div>
            </div>
            <hr class="modal_comentarios_separador"></hr>
            <div class="modal_direita_comentarios">
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
                      <div> <i class="fas fa-heart" style="color: #D24D57;"></i> </div>
                      <div><i class="fas fa-comment"></i></div>
                      <div><i class="fas fa-ellipsis-h optionsbuttonI"></i>
                        <div class="modal_hidden_options" style="display: none;">
                          <div>Remover</div>
                          <div>Reportar</div>
                        </div>
                      </div>
                      <div class="modal_comentario_buttons_likes"> <p>2 Likes</p></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="modal_comentarios_separador"></hr>
            <div class="autor_modal_info">
              <div class="autor_modal_info_btn"><i class="fas fa-heart" style="color: rgb(210, 77, 87);"></i></div>
              <div class="autor_modal_info_btn2 autor_modal_info_btn"><i class="fas fa-share-alt"></i></div>
            </div>
            <div class="modal_comentarios_bottom">
              <input autocomplete="off" type="text" class="modal_user_comentario" placeholder="Adicione um comentário...">
              <div> </div>
            </div>
          </div>
          <div class="close" style="color:white">&times;</div>
        </div>
      </div>
    </div>

    <script src="javascript/scriptsposts.js"></script>

    <!-----------------------------------------FINAL DA MODA CRIAR POSt--------------------------------->

    <div class='menuContent'>
      <ul>
        <div class="procura" id="procura">
          <form id="formprocura">
            <input type="text" autocomplete="off" id="tb_procura" class="buscar-txt" placeholder="Buscar..."/>

            <a class="buscar-btn">
              <i class="fas fa-search"></i>
            </a>
          </form>
        </div>
        <li> <a href="home.php"> Home </a> </li>
        <li> <a href="<?php echo "perfil.php?&uname=".$_SESSION['UtilUser']."&uid=".$_SESSION['UtilID']; ?>">Perfil</a></li>
        <li> <a href="mensagens.php">Mensagens</a> </li>
        <li> <a href="login.php"> Galeria</a> </li>
        <li><div class="post_creation_button"><i class="fas fa-plus-square" id="add_posts_nav"></i><span class="post_creation_text">Crie o seu post!</span></div></li>

        <li><div class="post_creation_button notification_creation_button" id="notification_bar_btn"><i class="far fa-bell" onclick="getNotificacoes()" style="position:relative;"><div class="notification_nr" id="notification_nr">2</div></i><span class="post_creation_text">Notificações!</span>
              <!--NOTIFICAÇÕES DA NAVBAR-->
              <div class="notificacao_container" id="notificacao_container" style="display:none;">

              </div>
              <!--Final da navbar-->
            </div>
        </li>
      </ul>
      <div class="name_dropdownlist">
        <label id="dropdownlistNavbar"> <?php echo $_SESSION["CPNome"].' '.$_SESSION["CUNome"]; ?> </label>
        <div class="navbar_menu_dropdown" id="navbar_menu_dropdown">
          <div> <a href="<?php echo "edit.php?&uname=".$_SESSION['UtilUser']."&uid=".$_SESSION['UtilID']; ?>"> Editar perfil </a></div>
          <div> <a href="privacidade.php"> Definições e Privacidade </a> </div>
          <div> <form method="post"> <input type="submit" value="Log Out" name="Destruir"> </form> </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js">
</script>
<script>
$('.toggle').on('click', function() {
  $('.menu').toggleClass('active');
  $("#navbar_menu_dropdown").css("display", "none");
});
</script>

<script src="javascript/scriptsnavbar.js">

</script>
</body>
