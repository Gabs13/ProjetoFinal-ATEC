//Botão do comentario dentro da modal
var btncomentario = document.getElementById('btn_comment');
//botao das settings i
var settingI = document.getElementsByClassName('optionsbuttonI');
//index das settings
//var indexSettings = document.getElementsByClassName('modal_hidden_options')[0];
var indexSettingsID = document.getElementById('modal_hidden_options_id');
//botao numero de likes comentarios modal
var likenumberButton = document.getElementsByClassName('modal_comentario_buttons_likes')[0];
//botao de like modal
var btnLikeModal = document.getElementById('btn_like');

for(var i of settingI)
{
  i.onclick= function(event)
  {
    event.preventDefault();
    if(this.nextElementSibling.style.display =="none")
    {
      this.nextElementSibling.style.display ="block";
    }
    else
    {
      this.nextElementSibling.style.display ="none";
    }
  }
}

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
