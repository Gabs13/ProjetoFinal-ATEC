<div class="logar">
    <div class="login_form">
      <div class="login_form_title">
        <img src="imagens/logotipo/artifex2.png">
      </div>

      <form method="post">
        <input type="text" id="logMail" name="logMail" placeholder="Insira o seu email">
        <input type="password" id="logPass" name="logPass" placeholder="Insira a sua senha">
        <input class="btn-login" type="submit" name="bt_login" id="LoginFormA" style="display:none;">
        <div class="col-md-3 col-sm-3 col-xs-6"> <a href="" id="LoginFormB" class="btn btn-sm animated-button victoria-two">Login</a> </div> 
      </form>
      <div class="col-md-3 col-sm-3 col-xs-6" id="btn_registo"> 
        <a href="includes/registo.php"  class="btn btn-sm animated-button victoria-two">Registar</a> 
      </div>
      <?php
        if(isset($_POST["bt_login"]))
        {
          entrarPHP($_POST["logMail"], $_POST["logPass"]);
        }
      ?>
    </div>


    <div class="limpa"></div>
</div>
