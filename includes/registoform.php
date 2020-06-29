<body class="anularscroll">
  <a href="login.php">
  <!--SIMBOLO ARTIFEX -->
    <div class="resultadoPesquisa_back" >
      <i><img src="imagens/logotipo/artifex2.png"></i>
      <span class="tooltiptext">Voltar para o Login</span>
    </div>
  </a>

  <div class="registo_main_container">

  <div class="registo_information">
  <div class="registo_info_texto"><div class="registo_info_texto_span"><span class="dot"></span></div>Os campos não podem ter caracteres especiais</div>
    <div class="registo_info_texto"><div class="registo_info_texto_span"><span class="dot"></span></div>O nome de utilizador tem que ter mais de seis letras</div>
    <div class="registo_info_texto"><div class="registo_info_texto_span"><span class="dot"></span></div>A password tem que ter no minimo oito caracteres</div>
  </div>
  
    

  <div class="pai">
      <div class="filho">
          <form method="post">
            <div class="titulo">Regista-te já!</div>
            <div class="borders border1"> <input type="text" id="regUsername" name="regUsername" class="username" placeholder="Nome de Utilizador" required> <div id="loader"> </div> </div>
            <div class="borders"> <input type="text" id="regNome" name="regNome" placeholder="Primeiro Nome" keypress="limparTB('regNome')" required> </div>
            <div class="borders"> <input type="text" id="regUNome" name="regUNome" placeholder="Ultimo Nome" required> </div>
            <div class="borders"> <input type="password" id="regPass" name="regPass" placeholder="Password" required> </div>
            <div class="borders"> <input type="password" id="regRPass" name="regRPass" placeholder="Confirmar Password" required> </div>
            <div class="regcheck">
              <input type="radio" name="regGenero" value = "1" required> <label>Masculino</label>
              <input type="radio" name="regGenero" value = "2"> <label>Feminino</label>
            </div>
            <div class="borders"> <input type="email" id="regEmail" name="regEmail" placeholder="E-mail" required> </div>
            <div class="borders"> <input type="date" onkeydown="return false" id="regData" min='1899-01-01' max='2000-13-13' name="regData" placeholder="Data de Nascimento" required> </div>
            <div>
                <input type="submit" name="bt_registar" value="Resgistar" id="registobtn1" style="display:none;">
                <div class="col-md-3 col-sm-3 col-xs-6">
                   <a href="" id="registobtn2" class="btn btn-sm animated-button victoria-two">Registar</a>
                </div>
            </div>
          </form>

          <?php
            if(isset($_POST["bt_registar"]))
            {
              registo($_POST["regEmail"], $_POST["regPass"], $_POST["regRPass"], $_POST["regNome"], $_POST["regUNome"], $_POST["regGenero"], $_POST["regData"], $_POST["regUsername"]);
            }
          ?>

          <script type="text/javascript">
          $(document).ready(function(){

            $(".border1").on('input', function(){
              $("#loader").show();

              $("#loader").html("<img src='imagens/icones/loader.gif' />");

              var username = $("#regUsername").val();

              if (username.length > 6)
              {
                $.ajax({
                  type: "POST",
                  url:"functions/functions.php",
                  data: {
                    action: "checkUserName",
                    nome: username,
                  },
                  success:function(result)
                  {
                    var finalResult = JSON.parse(result);

                    if(finalResult.user == false)
                    {
                      $("#loader").html('<i class="fas fa-check" style="color: green;"> </i>');
                    }
                    else
                    {
                      $("#loader").html('<i class="fas fa-times" style="color: red;"> </i>');
                    }
                  }
                })
              }
              else if (username.length == 0)
              {
                $("#loader").hide();
              }
              else
              {
                $("#loader").html('<i class="fas fa-times" style="color: red;"> </i>');
              }

            });

         });
          </script>
      </div>
  </div>
  </div><!--final do container principal-->
</body>
