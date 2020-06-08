<div class="logar">
    <div class="login_form">
      <div class="login_form_title">
        SIGN-IN
      </div>

      <form method="post">
        <input type="text" name="logmail" placeholder="Insira o seu email">
        <input type="password" name="logpass" placeholder="Insira a sua senha">
        <!---->
        <div class="col-md-3 col-sm-3 col-xs-6"> <a class="btn btn-sm animated-button victoria-two" href="#"> <input class="btn-login" type="submit" value="Entrar"> </a> </div>
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
