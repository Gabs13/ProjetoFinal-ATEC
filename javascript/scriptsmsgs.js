//pesquisa de utilizadores no chat
var clickSearchUser = document.getElementById('PesquisaNome');
var dropdownResultados = document.getElementsByClassName('chat_resultados_pesquisa')[0];

/*funcao para aparecer resultados pesquisados*/
clickSearchUser.onfocus = function()
{
  dropdownResultados.style.display="block";
  dropdownResultados.style.transition= "1s";

  $('#chat_user_settings_search').css('border-bottom-left-radius', '0px');
  $('#chat_user_settings_search').css('border-bottom-right-radius', '0px');

}
/*sair dos resultados pesquisados*/
clickSearchUser.onfocusout = function()
{
  dropdownResultados.style.display="none";
  dropdownResultados.style.transition= "1s";

  $('#chat_user_settings_search').css('border-radius', '8px');
}
$("#PesquisaNome").focusout(function(){

});
