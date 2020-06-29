<?php
  include 'conn.php';

  session_start();

  $mensagem = @$_POST['message'];
  $ConversaID = @$_POST['id'];

  $result = array();

  if (!empty($mensagem))
  {
    setlocale(LC_ALL, 'pt_PT');
    $horaatual = date("Y/m/d H:i:s");
    $result['send-status'] = mysqli_query($conn, "INSERT INTO MensagensConversa(Mensagem, UtilID, ConversaID, DataMsg, isDeleted) VALUES ('".$mensagem."', $_SESSION[UtilID], $ConversaID, '$horaatual', 0)");
    mysqli_query($conn, "UPDATE Conversas SET DataUltMsg = '$horaatual' WHERE ConversaID = $ConversaID");
  }

  //Escrever as msgs
  $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
  $IDConversa = $_GET['cid'];
  $items = mysqli_query($conn, "SELECT MensagemConversaID, Mensagem, MensagensConversa.UtilID, UtilPNome, UtilUNome, ConversaID, DataMsg, isDeleted FROM MensagensConversa LEFT JOIN Utilizadores ON MensagensConversa.UtilID = Utilizadores.UtilID WHERE MensagemConversaID > $start AND ConversaID = $IDConversa ORDER BY DataMsg ASC");
  while($row = mysqli_fetch_assoc($items))
  {
    $result['items'][] = $row;
  }

  include 'deconn.php';

  header('Access-Control-Allow-Origins: *');
  header('Content-Type: application/json');

  echo json_encode($result);

?>
