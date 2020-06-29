<?php
  include 'conn.php';

  session_start();

  $Notificacoes = mysqli_query($conn, "SELECT UtilID, Notificacoes.TipoNotificacaoID, TipoNotificacao, DataNotificacao, isViewed, PostID FROM Notificacoes LEFT JOIN TipoNotificacao ON Notificacoes.TipoNotificacaoID = TipoNotificacao.TipoNotificacaoID WHERE UtilIDdois = $_SESSION[UtilID] ORDER BY DataNotificacao DESC LIMIT 20");

  if(mysqli_num_rows($Notificacoes) != 0)
  {
    while($TodasNotificacoes = mysqli_fetch_array($Notificacoes))
    {
      $InfoUtil = mysqli_fetch_array(mysqli_query($conn, "SELECT UtilUser, UtilFoto FROM Utilizadores WHERE UtilID = $TodasNotificacoes[UtilID]"));
      if($TodasNotificacoes['isViewed'] == 0)
      {
        if($TodasNotificacoes['PostID'] == 0)
        {
          echo '<a href="perfil.php?&uname='.$InfoUtil['UtilUser'].'&uid='.$TodasNotificacoes['UtilID'].'">';
        }
        else
        {
          echo '<a href="login.php?pid='.$TodasNotificacoes['PostID'].'&uid='.$TodasNotificacoes['UtilID'].'">';
        }

      echo' <div class="notification_item notification_item_vista">
            <div class="notification_item_img notification_item_img_vista">';
        if($InfoUtil['UtilFoto'] != null)
        {
          echo '<img src="imagens/Utilizadores/'.$InfoUtil['UtilFoto'].'">';
        }
        else
        {
          echo '<img src="imagens/Icones/icons8-male-user-26.png">';
        }
        echo'</div>
            <div class="notification_item_info notification_item_info_vista">
              <div class="notification_item_info_username notification_item_info_username_vista">@'.$InfoUtil['UtilUser'].'</div>
              <div class="notification_item_info_text notification_item_info_text_vista">'.$TodasNotificacoes['TipoNotificacao'].'</div>
            </div>
            <div class="notification_item_notice notification_item_notice_vista"><i class="fas fa-circle"></i></div>
          </div> </a>';
      }
      else
      {
        if($TodasNotificacoes['PostID'] == 0)
        {
          echo '<a href="perfil.php?&uname='.$InfoUtil['UtilUser'].'&uid='.$TodasNotificacoes['UtilID'].'">';
        }
        else
        {
          echo '<a href="login.php?pid='.$TodasNotificacoes['PostID'].'&uid='.$TodasNotificacoes['UtilID'].'">';
        }

      echo' <div class="notification_item">
            <div class="notification_item_img">';
        if($InfoUtil['UtilFoto'] != null)
        {
          echo '<img src="imagens/Utilizadores/'.$InfoUtil['UtilFoto'].'">';
        }
        else
        {
          echo '<img src="imagens/Icones/icons8-male-user-26.png">';
        }
        echo'</div>
            <div class="notification_item_info">
              <div class="notification_item_info_username">@'.$InfoUtil['UtilUser'].'</div>
              <div class="notification_item_info_text">'.$TodasNotificacoes['TipoNotificacao'].'</div>
            </div>
            <div class="notification_item_notice"></div>
          </div> </a>';
      }
    }
  }
  else
  {
    echo 'Não tem notificações.';
  }


  include 'deconn.php';
?>
