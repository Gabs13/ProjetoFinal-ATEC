<?php
  include 'conn.php';

  session_start();

  $CID = $_POST['id'];

  $Conversas = mysqli_query($conn, "SELECT u.UtilID as UtilID, c.ConversaID as ConversaID, u.UtilPNome as PrimeiroNome, u.UtilUNome as SegundoNome FROM Conversas c, Utilizadores as u WHERE CASE WHEN c.UserUm = $_SESSION[UtilID] THEN c.UserDois = u.UtilID WHEN c.UserDois = $_SESSION[UtilID] THEN c.UserUm = u.UtilID END AND (c.UserUm = $_SESSION[UtilID] OR c.UserDois = $_SESSION[UtilID]) AND ConversaID = $CID");

  $TodasConversas = mysqli_fetch_array($Conversas);

  echo $TodasConversas["PrimeiroNome"].' '.$TodasConversas["SegundoNome"];

  include 'deconn.php';
?>
