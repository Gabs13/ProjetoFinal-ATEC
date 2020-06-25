<?php

  include 'conn.php';

  session_start();

  $Nome = $_POST['nome'];

  $PesquisaNome = mysqli_query($conn, "SELECT UtilID, CONCAT(UtilPNome, ' ', UtilUNome) as Nome FROM Utilizadores WHERE CONCAT(UtilPNome, ' ', UtilUNome) LIKE '%$Nome%' AND UtilID != $_SESSION[UtilID]  LIMIT 5");

  while($ResultadoNome = mysqli_fetch_array($PesquisaNome))
  {
    echo '<li>
        <div class="chat_resultados_pesquisa_output">
            <div class="chat_resultados_pesquisa_output_img"><a><img src="imagens/Icones/icons8-male-user-26.png"></a></div>
            <div class="chat_resultados_pesquisa_output_nome">'.$ResultadoNome["Nome"].'</div>
        </div>
    </li>';
  }

  include 'deconn.php';

?>
