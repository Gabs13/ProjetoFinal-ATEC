<?php
  include 'conn.php';

  session_start();

  $Conversas = mysqli_query($conn, "SELECT u.UtilID as UtilID, c.ConversaID as ConversaID, u.UtilPNome as PrimeiroNome, u.UtilUNome as SegundoNome FROM Conversas c, Utilizadores as u WHERE CASE WHEN c.UserUm = $_SESSION[UtilID] THEN c.UserDois = u.UtilID WHEN c.UserDois = $_SESSION[UtilID] THEN c.UserUm = u.UtilID END AND (c.UserUm = $_SESSION[UtilID] OR c.UserDois = $_SESSION[UtilID])");

  while($TodasConversas = mysqli_fetch_array($Conversas))
  {
    $Conversa = mysqli_query($conn, "SELECT ConversaID, Mensagem, UtilID, DataMsg FROM MensagensConversa WHERE ConversaID = $TodasConversas[ConversaID] ORDER BY MensagemConversaID DESC LIMIT 1");

    $UltimaMsg = mysqli_fetch_array($Conversa);

    $Data = new DateTime($UltimaMsg["DataMsg"]);

    setlocale(LC_ALL, 'pt_PT');

    echo '
    <div class="chat_users_display_user" onclick="limparMsgs('.$UltimaMsg["ConversaID"].'); loadMsgs('.$UltimaMsg["ConversaID"].');">
        <div class="chat_users_display_user_img"><a><img src="imagens/Icones/icons8-male-user-26.png"></a></div>
        <div class="chat_users_display_info">
            <div class="chat_users_display_user_nome" id="chat_users_display_user_nome">'.$TodasConversas["PrimeiroNome"].' '.$TodasConversas["SegundoNome"].'</div>
            <div class="chat_users_display_user_mensagem">';
            if ($UltimaMsg["UtilID"] != $_SESSION["UtilID"])
            {
              echo $UltimaMsg["Mensagem"].' <i style="color: blue; float: right; margin-right: 10px;">'.strftime("%a", strtotime($UltimaMsg["DataMsg"])).'</i>';
            }
            else
            {
              echo 'Tu: '.$UltimaMsg["Mensagem"].' <i style="color: blue; float: right; margin-right: 10px;">'.strftime("%a", strtotime($UltimaMsg["DataMsg"])).'</i>';
            }
            echo'</div>
        </div>
    </div>';
  }

  include 'deconn.php';
?>
