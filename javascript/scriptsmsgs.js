$(document).ready(function(){
  //pesquisa de utilizadores no chat
  var clickSearchUser = document.getElementById('PesquisaNome');
  var dropdownResultados = document.getElementsByClassName('chat_resultados_pesquisa')[0];

  $(".chat_user_settings_search").on('input', function(){

    var nome = $("#PesquisaNome").val();
    if (nome != '')
    {
      dropdownResultados.style.display="block";
      dropdownResultados.style.transition= "1s";

      $('#chat_user_settings_search').css('border-bottom-left-radius', '0px');
      $('#chat_user_settings_search').css('border-bottom-right-radius', '0px');

      $("#chat_resultados_pesquisa").load("functions/CarregarNomesPesquisa.php", {nome: nome});
    }
    else
    {
      dropdownResultados.style.display="none";
      dropdownResultados.style.transition= "1s";

      $('#chat_user_settings_search').css('border-radius', '8px');
    }
  });
});

function todasMensagens()
{
  $("#chat_users_display").load("functions/CarregarMensagens.php");
}

var start = 0;
var cid = 0, abc = 0;

$(document).ready(function(){

  $('form').submit(function (e){
    $.post('functions/CarregarConversa.php', {
      message: $('#tb_messagem').val(),
      id: cid,
    });
    $('#tb_messagem').val('');
    return false;
  })
});

function criarConversa(id)
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data:{
      action: "criarConversaPHP",
      id: id,
    },
    success:function(result)
    {
      var finalResult = JSON.parse(result);

      limparMsgs(finalResult.Info);
      loadMsgs(finalResult.Info);
    }
  });
}

var intervalomsgs;

function limparMsgs(id)
{
    $('#chat_display_messages').empty();
    start = 0;

    $.ajax({
      type: "POST",
      url: "functions/functions.php",
      data: {
        action: 'CarregarInfoConversaPHP',
        id: id,
      },
      success:function(result)
      {
        var finalResult = JSON.parse(result);

        $('#chat_display_user_name').html(finalResult.Info['PrimeiroNome'] + ' ' + finalResult.Info['SegundoNome']);
        $('#chat_display_user_username').html('@' + finalResult.Info['User']);

        if(finalResult.Info['Foto'] != null)
        {
          $('#chat_display_user_img_img').attr("src", "imagens/Utilizadores/" + finalResult.Info['Foto']);
        }
        else
        {
          $('#chat_display_user_img_img').attr("src", "imagens/Icones/icons8-male-user-26.png");
        }
      }
    });

    $('#chat_display').css('display', 'block');

    clearInterval(intervalomsgs);
}

function loadMsgs(id)
{
  intervalomsgs = setInterval(function(){

    cid = id;

    $.get('functions/CarregarConversa.php' + '?start=' + start + '&cid=' + id, function(result){
      if(result.items)
      {
        result.items.forEach(item =>{
          start = item.MensagemConversaID;
          $('#chat_display_messages').append(renderMessage(item));
        })
        $('#chat_display_messages').animate({scrollTop: $('#chat_display_messages')[0].scrollHeight});
      };
      todasMensagens();
    });
  }, 1000);
}

function renderMessage(item)
{
  let today = new Date();
  let diamsg = new Date(item.DataMsg);
  let time = new Date(item.DataMsg);

  if (time.getMinutes() < 10){
    time = time.getHours() + ':0' + time.getMinutes();
  }
  else {
    time = time.getHours() + ':' + time.getMinutes();
  }
  if (item.UtilID == IDSessao)
  {
    if (diamsg.getDay() != today.getDay())
    {
      return '<div class="chat_display_messages_ocupy"> <div class="chat_display_messages_display"> <div class="chat_display_messages_nome">' + item.UtilPNome + ' ' + item.UtilUNome + '</div> <div class="chat_display_messages_texto">' + item.Mensagem + '</div> <div class="chat_display_messages_hora">' + (diamsg.getMonth() + 1) + '/' + diamsg.getDate() + ' ' + time + '</div> </div> </div>';
    }
    else
    {
      return '<div class="chat_display_messages_ocupy"> <div class="chat_display_messages_display"> <div class="chat_display_messages_nome">' + item.UtilPNome + ' ' + item.UtilUNome + '</div> <div class="chat_display_messages_texto">' + item.Mensagem + '</div> <div class="chat_display_messages_hora">' + time + '</div> </div> </div>';
    }

  }
  else
  {
    if (diamsg.getDay() != today.getDay())
    {
      return '<div class="chat_display_messages_ocupy"> <div class="chat_display_messages_display_left"> <div class="chat_display_messages_nome">' + item.UtilPNome + ' ' + item.UtilUNome + '</div> <div class="chat_display_messages_texto">' + item.Mensagem + '</div> <div class="chat_display_messages_hora">' + (diamsg.getMonth() + 1) + '/' + diamsg.getDate() + ' ' + time + '</div> </div> </div>' ;
    }
    else
    {
      return '<div class="chat_display_messages_ocupy"> <div class="chat_display_messages_display_left"> <div class="chat_display_messages_nome">' + item.UtilPNome + ' ' + item.UtilUNome + '</div> <div class="chat_display_messages_texto">' + item.Mensagem + '</div> <div class="chat_display_messages_hora">' + time + '</div> </div> </div>' ;
    }
  }
}
