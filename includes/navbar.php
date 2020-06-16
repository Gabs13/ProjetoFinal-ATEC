<html lang="pt">
  <body>
  <div class="navbar_menu_dropdown">
        <div>Editar perfil</div>
        <div>Definições e Privacidade</div>
        <div>Ajuda e Support</div>
        <div>Logout</div>
      </div>
      <div class='menu'>
          <span class='toggle' id='toggle'>
            <img src="imagens/Utilizadores/gabriel.jpg" alt="teste" width="65" height="65">
          </span>
          
          <div class='menuContent'>
            <ul>
              <div class="procura">
                <input type="text" name="" class="buscar-txt" placeholder="Buscar..."/>
                <a class="buscar-btn">
                  <i class="fas fa-search"></i>
                </a>
              </div>
              <li>Perfil</li>
              <li>Network</li>
              <li>Galeria</li>
              <form method="post">
                <input type="submit" value="Destruir Sessão" name="Destruir">
              </form>
            </ul>
            <label> <?php echo $_SESSION["CPNome"].' '.$_SESSION["CUNome"]; ?> </label>
          </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js">
    </script>
    <script>
        $('.toggle').on('click', function() {
    	$('.menu').toggleClass('active');
    });
    </script>
  </body>
</html>
