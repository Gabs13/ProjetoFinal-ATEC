//Botão do comentario dentro da modal
var btncomentario = document.getElementById('btn_comment');
//botao das settings i
var settingI = document.getElementById('optionsbuttonI');
//index das settings
var indexSettings = document.getElementsByClassName('modal_hidden_options');
//botao numero de likes comentarios modal
var likenumberButton = document.getElementsByClassName('modal_comentario_buttons_likes')[0];
//botao de like modal
var btnLikeModal = document.getElementById('btn_like');




/*CLICK BOTAO COMENTARIO MODAL ---------------------------------------------*/
btncomentario.onclick = function()
{
  if(document.getElementsByClassName('modal_comentario_resposta')[0].style.display=="none")
  {
    document.getElementsByClassName('modal_comentario_resposta')[0].style.display="flex";
  }
  else
  {
    document.getElementsByClassName('modal_comentario_resposta')[0].style.display="none";
  }
}

settingI.onclick = function()
{

  if(indexSettings[0].style.display=="none")
  {
    indexSettings[0].style.display="block";
  }
  else
  {
    indexSettings[0].style.display="none";
  }

  /*border da cena de cima com os tres pontos*/
  if(settingI.style.border=="none")
  {
    settingI.style.border="1px solid gray";
  }
  else
  {
    settingI.style.border="none";
  }
}
//carregar a modal dos gostos dos comentarios
likenumberButton.onclick=function()
{
  if(document.getElementsByClassName('display_like_background')[0].style.display=="none")
  {
    document.getElementsByClassName('display_like_background')[0].style.display="block";
  }
  else
  {
    document.getElementsByClassName('display_like_background')[0].style.display="none";
  }
}

btnLikeModal.onclick = function()
{
  if(btnLikeModal.style.color="black")
  {
    btnLikeModal.style.color="#D24D57"
  }
  else
  {
    btnLikeModal.style.color="black"
  }
}
