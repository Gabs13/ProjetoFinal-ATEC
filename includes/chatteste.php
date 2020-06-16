<style>
  body{
    margin: 0;
    overflow: hidden;
  }

  #messages{
    height: 88vh;
    overflow-x: hidden;
    padding: 10px;
  }

  form{
    display: flex;
    width: 100%;
  }

  input{
    font-size: 1.2rem;
    padding: 10px;
    margin: 10px 5px;
    appearance: none;
    -webkit-appearance: none;
    border: 1px solid #CCC;
    border-radius: 5px;

  }

  input:first-of-type
  {
    width: 90%;
  }

  input:last-of-type
  {
    width: 10%;
  }

  #message{
    flex: 2;
  }

  .msg{
    background-color: #dcf8c6;
    padding: 5px 10px;
    border-radius: 5px;
    margin-bottom: 8px;
    width: fit-content;
  }

  .msg p{
    margin: 0;
    font-weight: bold;
  }

  .msg span{
    font-size: 0.7rem;
    margin-left: 15px;
  }
</style>

<script>
  var IDSessao = "<?php echo $_SESSION['UtilID'] ?>";
  var NomeSessao = "<?php echo $_SESSION['CPNome'] ?>";
  var UNSessao = "<?php echo $_SESSION['CUNome'] ?>";
  console.log(NomeSessao);
</script>

<script>
  var start = 0, url = 'http://localhost/ProjetoFinal/functions/Chat.php';
  $(document).ready(function(){
    loadMsgs();

    $('form').submit(function (e){
      $.post(url, {
        message: $('#message').val()
      });
      $('#message').val('');
      return false;
    })
  });

  function loadMsgs()
  {
    $.get(url + '?start=' + start, function(result){
      if(result.items){
        result.items.forEach(item =>{
          start = item.MensagemID;
          $('#messages').append(renderMessage(item));
        })
        $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight});
      };
      setTimeout(loadMsgs, 1000);
    });
  }

  function renderMessage(item)
  {
    let time = new Date(item.DataMsg);
    if (time.getMinutes() < 10){
      time = time.getHours() + ':0' + time.getMinutes();
    }
    else {
      time = time.getHours() + ':' + time.getMinutes();
    }
    if (item.FromID == IDSessao)
    {
      return '<div class="msg" style="margin-left: 90%;"> <p>' + item.FromID + '</p>' + item.Mensagem + ' <span>' + time + '</span></div>' ;
    }
    else
    {
      return '<div class="msg"> <p>' + item.FromID + '</p>' + item.Mensagem + ' <span>' + time + '</span></div>' ;
    }
  }
</script>

<body>
    <div id="messages"></div>
    <form>
      <input type="text" id="message" autocomplete="off" autofocus placeholder="Escreva uma mensagem..">
      <input type="submit" value="enviar">
    </form>
</body>
