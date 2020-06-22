//pesquisa de utilizadores no chat
//var clickSearchUser = document.getElementById('PesquisaNome');
var dropdownResultados = document.getElementsByClassName('chat_resultados_pesquisa')[0];

/*funcao para aparecer resultados pesquisados*/
/*clickSearchUser.onfocus = function()
{
  dropdownResultados.style.display="block";
  dropdownResultados.style.transition= "1s";

  $('#chat_user_settings_search').css('border-bottom-left-radius', '0px');
  $('#chat_user_settings_search').css('border-bottom-right-radius', '0px');

}
/*sair dos resultados pesquisados*/
/*clickSearchUser.onfocusout = function()
{
  dropdownResultados.style.display="none";
  dropdownResultados.style.transition= "1s";

  $('#chat_user_settings_search').css('border-radius', '8px');
}*/

$("#PesquisaNome").focusout(function(){

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



function limparMsgs()
{
    $('#chat_display_messages').empty();
    start = 0;
}

function loadMsgs(id)
{
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

    setTimeout(function() {loadMsgs(cid);}, 1000)
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
  if (item.UtilID == IDSessao)
  {
    return '<div class="chat_display_messages_ocupy"> <div class="chat_display_messages_display"> <div class="chat_display_messages_nome">' + item.UtilPNome + ' ' + item.UtilUNome + '</div> <div class="chat_display_messages_texto">' + item.Mensagem + '</div> <div class="chat_display_messages_hora">' + time + '</div> </div> </div>';
  }
  else
  {
    return '<div class="chat_display_messages_ocupy"> <div class="chat_display_messages_display_left"> <div class="chat_display_messages_nome">' + item.UtilPNome + ' ' + item.UtilUNome + '</div> <div class="chat_display_messages_texto">' + item.Mensagem + '</div> <div class="chat_display_messages_hora">' + time + '</div> </div> </div>' ;
  }
}
