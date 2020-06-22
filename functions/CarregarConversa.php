<?php
  include 'conn.php';

  session_start();

  $mensagem = @$_POST['message'];
  $ConversaID = @$_POST['id'];

  $result = array();

  if (!empty($mensagem))
  {
    $result['send-status'] = mysqli_query($conn, "INSERT INTO MensagensConversa(Mensagem, UtilID, ConversaID) VALUES ('".$mensagem."', $_SESSION[UtilID], $ConversaID)");
  }

  //Escrever as msgs
  $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
  $IDConversa = $_GET['cid'];
  $items = mysqli_query($conn, "SELECT MensagemConversaID, Mensagem, MensagensConversa.UtilID, UtilPNome, UtilUNome, ConversaID, DataMsg FROM MensagensConversa LEFT JOIN Utilizadores ON MensagensConversa.UtilID = Utilizadores.UtilID WHERE MensagemConversaID > $start AND ConversaID = $IDConversa ORDER BY DataMsg ASC");
  while($row = mysqli_fetch_assoc($items))
  {
    $result['items'][] = $row;
  }

  include 'deconn.php';

  header('Access-Control-Allow-Origins: *');
  header('Content-Type: application/json');

  echo json_encode($result);

?>
