<body>
  <div class="resultado_Pesquisa_total">

    <div class="resultadoPesquisa_body">
      <div class="resultadoPesquisa_body_label">Pesquisa </div>
      <div class="resultadosPesquisa_list">

        <?php
          $nomepesquisa = $_GET['pesq'];


          include 'functions/conn.php';

          $Util = mysqli_query($conn, "SELECT UtilID, UtilUser, UtilPNome, UtilUNome, UtilFoto FROM Utilizadores WHERE CONCAT(UtilPNome, ' ', UtilUNome) LIKE '%$nomepesquisa%' OR UtilUser LIKE '%$nomepesquisa%'");

          if(mysqli_num_rows($Util) > 0)
          {
            while($Dados = mysqli_fetch_array($Util))
            {
              echo '<div class="resultadosPesquisa_container">
                <div class="resultadosPesquisa_container_img">';
                if($Dados['UtilFoto'] != null)
                {
                  echo '<img src="imagens/Utilizadores/'.$Dados['UtilFoto'].'">';
                }
                else
                {
                  echo '<img src="imagens/Icones/icons8-male-user-26.png">';
                }
                echo'</div>
                <div class="resultadosPesquisa_container_nome">'.$Dados['UtilPNome'].' '.$Dados['UtilUNome'].'
                  <div class="resultadosPesquisa_container_nomearroba">@'.$Dados['UtilUser'].'</div>
                </div>
                
              </div>';
            }
          }
          else
          {
            echo '<div class="resultados_pesquisa_empty">Não existem resultados na pesquisa.</div>';
          }

          include 'functions/deconn.php';
        ?>


      <div class="resultadoPesquisa_body_end"></div>


    </div>
  </div>
</body>
