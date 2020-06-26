<body>
    <div class='menu'>
        <span class='toggle' id='toggle'>
          <img src="imagens/Utilizadores/gabriel.jpg" alt="teste" width="65" height="65">
        </span>
        
        <div class="modal_perfil" id="modal_perfil" style="display:none;">
    <div class="modal_perfil_container">
      <div class="modal_perfil_container_nome">
        <div class="modal_perfil_container_title">Seguidores</div>
        <span class="perfil_modal_close" id="perfil_modal_close">X</span>
      </div>
      <div class="modal_perfil_container_main">
        <div class="modal_perfil_container_items">
          <div class="modal_perfil_container_items_img"><a><img src=""></a></div>
          <div class="modal_perfil_container_items_nome">
            <div class="modal_perfil_container_items_nome_name">Gabigol</div>
            <div class="modal_perfil_container_items_nome_username">Gabriel Cosme</div>
          </div>
        </div>
      </div>

      <div class="modal_perfil_container_final"></div>
    </div>

  </div>
  <!--FINAL MODAL PERFIL-->

          <div class='menuContent'>
            <ul>
              <div class="procura" id="procura">
                <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
                <a class="buscar-btn">
                  <i class="fas fa-search"></i>
                </a>
              </div>
              <li>Home</li>
              <li> <a href="perfil.php">Perfil</a></li>
              <li> <a href="mensagens.php">Mensagens</a> </li>
              <li> <a href="login.php"> Galeria</a> </li>

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
