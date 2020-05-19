<div class="logar">
    <div class="login_form">
      <h3>Login</h3>
      <form method="post">
        <input type="text" name="logmail" placeholder="Insira o seu email">
        <input type="password" name="logpass" placeholder="Insira a sua senha">
        <input type="submit" name="bt_login" value="Entrar">
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
