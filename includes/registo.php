<body>
  <div class="pai">
      <div class="filho">
          <form method="post">
            <div class="titulo">Regista-te já!</div>
            <div class="borders border1"> <input type="text" id="regNome" name="regNome" placeholder="Primeiro Nome" keypress="limparTB('regNome')" required> </div>
            <div class="borders"> <input type="text" id="regUNome" name="regUNome" placeholder="Ultimo Nome" required> </div>
            <div class="borders"> <input type="password" id="regPass" name="regPass" placeholder="Password" required> </div>
            <div class="borders"> <input type="password" id="regRPass" name="regRPass" placeholder="Confirmar Password" required> </div>
            <div class="borders"> <input type="number" id="regTlmv" name="regTlmv" placeholder="Telemovel"> </div>
            <div class="regcheck">
              <input type="radio" name="regGenero" value = "1" required> <label>Masculino</label>
              <input type="radio" name="regGenero" value = "2"> <label>Feminino</label>
              <input type="radio" name="regGenero" value = "3"> <label>Outro</label>
            </div>
            <div class="borders"> <input type="email" id="regEmail" name="regEmail" placeholder="E-mail" required> </div>
            <div class="borders"> <input type="date" name="regData" placeholder="Data de Nascimento" required> </div>
            <div>
                <input type="submit" name="bt_registar" value="Resgistar">
            </div>
          </form>

          <?php
            if(isset($_POST["bt_registar"]))
            {
              registo($_POST["regEmail"], $_POST["regPass"], $_POST["regRPass"], $_POST["regNome"], $_POST["regUNome"], $_POST["regTlmv"], $_POST["regGenero"], $_POST["regData"]);
            }
          ?>
      </div>
  </div>
</body>
