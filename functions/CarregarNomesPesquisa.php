<?php

  include 'conn.php';

  session_start();

  $Nome = $_POST['nome'];

  $PesquisaNome = mysqli_query($conn, "SELECT UtilID, CONCAT(UtilPNome, ' ', UtilUNome) as Nome, UtilFoto, UtilUser FROM Utilizadores WHERE (CONCAT(UtilPNome, ' ', UtilUNome) LIKE '%$Nome%' OR UtilUser LIKE '%$Nome%') AND UtilID != $_SESSION[UtilID]  LIMIT 5");


  while($ResultadoNome = mysqli_fetch_array($PesquisaNome))
  {
        echo '<li>
            <div class="chat_resultados_pesquisa_output">';
            if ($ResultadoNome['UtilFoto'] != null)
            {
              echo   '<div class="chat_resultados_pesquisa_output_img"><a><img src="imagens/Utilizadores/'.$ResultadoNome['UtilFoto'].'"></a></div>';
            }
            else
            {
              echo   '<div class="chat_resultados_pesquisa_output_img"><a><img src="imagens/Icones/icons8-male-user-26.png"></a></div>';
            }

            echo' <div class="chat_resultados_pesquisa_output_nome"><div>'.$ResultadoNome["Nome"].'</div><div class="chat_search_user_username">@'.$ResultadoNome["UtilUser"].'</div></div>
                <span class="chat_resultados_pesquisa_output_add" onclick="criarConversa('.$ResultadoNome["UtilID"].');"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
            </div>
        </li>';
  }

  include 'deconn.php';

?>
