<div class="logar">
    <div class="login_form">
      <div class="login_form_title">
        SIGN-IN
      </div>
      
      <form method="post">
        <input type="text" name="logmail" placeholder="Insira o seu email">
        <input type="password" name="logpass" placeholder="Insira a sua senha">
        <!--<input type="submit" name="bt_login" value="Entrar" id="login_form_button">-->
        <div class="col-md-3 col-sm-3 col-xs-6"> <a href="#" class="btn btn-sm animated-button victoria-two">Login</a> </div>
      </form>

      <?php

      if(isset($_POST["bt_login"]))
      {
        entrar($_POST["logmail"], $_POST["logpass"]);
      }

      ?>

    </div>

    <div class="limpa"></div>
</div>
