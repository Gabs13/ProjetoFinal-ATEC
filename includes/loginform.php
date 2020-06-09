<div class="logar">
    <div class="login_form">
      <div class="login_form_title">
        <img src="imagens/logotipo/artifex2.png">
      </div>

      <form method="post">
        <input type="text" name="logMail" placeholder="Insira o seu email">
        <input type="password" name="logPass" placeholder="Insira a sua senha">
        <input class="btn-login" type="submit" name="bt_login"  id="LoginFormA" style="display:none;">
        <div class="col-md-3 col-sm-3 col-xs-6"> <a href=""  id="LoginFormB" class="btn btn-sm animated-button victoria-two">Login</a> </div>
      </form>

      <?php

      if(isset($_POST["bt_login"]))
      {
        entrar($_POST["logMail"], $_POST["logPass"]);
      }

      ?>

    </div>

    <div class="limpa"></div>
</div>
