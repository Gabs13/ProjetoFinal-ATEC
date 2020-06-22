<?php
  include 'conn.php';

  session_start();

  $Conversas = mysqli_query($conn, "SELECT u.UtilID as UtilID, c.ConversaID as ConversaID, u.UtilPNome as PrimeiroNome, u.UtilUNome as SegundoNome FROM Conversas c, Utilizadores as u WHERE CASE WHEN c.UserUm = $_SESSION[UtilID] THEN c.UserDois = u.UtilID WHEN c.UserDois = $_SESSION[UtilID] THEN c.UserUm = u.UtilID END AND (c.UserUm = $_SESSION[UtilID] OR c.UserDois = $_SESSION[UtilID])");

  while($TodasConversas = mysqli_fetch_array($Conversas))
  {
    $Conversa = mysqli_query($conn, "SELECT ConversaID, Mensagem FROM MensagensConversa WHERE ConversaID = $TodasConversas[ConversaID] ORDER BY MensagemConversaID DESC LIMIT 1");

    $UltimaMsg = mysqli_fetch_array($Conversa);

    echo '
    <div class="chat_users_display_user" onclick="limparMsgs(); loadMsgs('.$UltimaMsg["ConversaID"].');">
        <div class="chat_users_display_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
        <div class="chat_users_display_info">
            <div class="chat_users_display_user_nome">'.$TodasConversas["PrimeiroNome"].' '.$TodasConversas["SegundoNome"].'</div>
            <div class="chat_users_display_user_mensagem">'.$UltimaMsg["Mensagem"].'</div>
        </div>
    </div>';
  }

  include 'deconn.php';
?>
