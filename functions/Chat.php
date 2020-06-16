<?php

  include 'conn.php';


  $result = array();
  $messagem = @$_POST['message'];

  if (!empty($messagem))
  {
    $result['send-status'] = mysqli_query($conn, "INSERT INTO Mensagens(FromID, ToID, Mensagem) VALUES ('5', '7', '".$messagem."')");
  }

  //Escrever as msgs
  $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
  $items = mysqli_query($conn, "SELECT * FROM Mensagens WHERE MensagemID > $start ORDER BY DataMsg ASC");
  while($row = mysqli_fetch_assoc($items))
  {
    $result['items'][] = $row;
  }

  include 'deconn.php';

  header('Access-Control-Allow-Origins: *');
  header('Content-Type: application/json');

  echo json_encode($result);

?>
