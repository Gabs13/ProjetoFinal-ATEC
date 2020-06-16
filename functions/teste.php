<?php
  include 'conn.php';

  $nome = $_REQUEST["nome"];

  $js_code = '<script language = "javascript">console.log('.$nome.')</script>';

  echo $js_code;

  //$nome = mysqli_real_escape_string($conn, $nome);

  $pesquisa = mysqli_query($conn, "SELECT * FROM Utilizadores WHERE UtilPNome LIKE '%$nome%'");

  $Data = array();

  while($nomes = mysqli_fetch_array($pesquisa))
  {
    array_push($Data, $nomes['UtilPNome']);
  }

  include 'deconn.php';

  //echo json_encode($Data);
?>
