<body>
  <div class="pai">
      <div class="filho">
          <form method="post">
            <div class="titulo">Regista-te já!</div>
            <div class="borders border1"> <input type="text" name="regNome" placeholder="Primeiro Nome" required> </div>
            <div class="borders"> <input type="text" name="regUNome" placeholder="Ultimo Nome" required> </div>
            <div class="borders"> <input type="password" name="regPass" placeholder="Password" required> </div>
            <div class="borders"> <input type="password" name="regRPass" placeholder="Confirmar Password" required> </div>
            <div class="borders"> <input type="number" placeholder="Telemovel"> </div>
            <div class="regcheck">
              <input type="radio" name="genero" value = "M"> <label>Masculino</label>
              <input type="radio" name="genero" value = "F"> <label>Feminino</label>
              <input type="radio" name="genero" value = "O"> <label>Outro</label>
            </div>
            <div class="borders"> <input type="email" name="regEmail" placeholder="E-mail" required> </div>
            <div class="borders"> <input type="date" name="regData" placeholder="Data de Nascimento" required> </div>
            <div>
                <input type="submit" name="bt_registar" value="Resgistar">
            </div>
          </form>

          <?php
            if(isset($_POST["bt_registar"]))
            {
              registo($_POST["regEmail"], $_POST["regPass"], $_POST["regRPass"], $_POST["regNome"], $_POST["regUNome"], $_POST["regData"]);
            }
          ?>
      </div>
  </div>
</body>
