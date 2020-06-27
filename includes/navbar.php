<body>
    <div class='menu'>
        <span class='toggle' id='toggle'>
          <img src="imagens/Utilizadores/gabriel.jpg" alt="teste" width="65" height="65">
        </span>
  
<!------------------------------------INICIO DO MODAL DE CRIAR POST--------------------------------------->
<div class="modal_criar_post" id="modal_criar_post" style="display:none">
      <span id="modal_criar_post_close">&times;</span>
      <form action="functions/functions.php" method="POST" enctype="multipart/form-data">
          <div class="home_main"><!--ONDE VAO TAR OS POSTS-->
            <!--CRIACAO DO POST-->
            <div class="home_post_create">
              <div class="home_post_create_titulo">Insira o seu post...</div>
              <div class="home_post_create_container">
                <input class="home_post_create_container_texto" id="home_post_create_container_texto_1" name="tb_desc_1" placeholder="Escreva a sua descrição..." disabled>
                <div class="home_post_create_container_btns">
                  <input type="file" name="bt_carregarfoto_1" id="post_img_file_1" style="display:none;">
                  <input type="submit" name="bt_postarfoto_2" id="post_send_file_2" style="display:none;">
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
        <div class="home_post_example" id="imgpreview">
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
            <input autocomplete="off" type="text" id="comentario_bottom_1" class="modal_user_comentario" placeholder="Adicione um comentário...">
            <div id="modal_user_sendbtn"> </div>
          </div>  
        </div>
          <div class="close" id="closePerfil" style="color:white">&times;</div>
      </div>
  </div>
</div>

<!-------------------------------------------FINAL DA MODA CRIAR POST------------------------------------------>
          <div class='menuContent'>
            <ul>
              <div class="procura" id="procura">
                <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
                <a class="buscar-btn">
                  <i class="fas fa-search"></i>
                </a>
              </div>
              <li style="padding-left:0;">Home</li>
              <li> <a href="perfil.php">Perfil</a></li>
              <li> <a href="mensagens.php">Mensagens</a> </li>
              <li> <a href="login.php"> Galeria</a> </li>
              <li><i class="fas fa-plus-square" id="add_posts_nav"></i></li>
            </ul>
            <div class="name_dropdownlist">
              <label id="dropdownlistNavbar"> <?php echo $_SESSION["CPNome"].' '.$_SESSION["CUNome"]; ?> </label>
              <div class="navbar_menu_dropdown" id="navbar_menu_dropdown">
                <div> <a href="edit.php"> Editar perfil </a></div>
                <div>Definições e Privacidade</div>
                <div>Ajuda e Support</div>
                <div>
                  <form method="post">
                    <input type="submit" value="Log Out" name="Destruir">
                  </form>
                </div>
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
