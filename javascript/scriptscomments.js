//Botão do comentario dentro da modal
var btncomentario = document.getElementById('btn_comment');
//botao das settings i
var settingI = document.getElementsByClassName('optionsbuttonI');
//index das settings
//var indexSettings = document.getElementsByClassName('modal_hidden_options')[0];
var indexSettingsID = document.getElementById('modal_hidden_options_id');
//botao numero de likes comentarios modal
var likenumberButton = document.getElementsByClassName('modal_comentario_buttons_likes');
//botao de like modal
var btnLikeModal = document.getElementById('btn_like');
//
var modallikesdisplay = document.getElementById('display_like_background');

//Span da modal do numero de likes
var spanLikes = document.getElementById('display_like_post_close');


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

spanLikes.onclick = function()
{
  document.getElementById('display_like_background').style.display="none";
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




for(var e of likenumberButton)
{
  e.onclick= function(event)
  {
    event.preventDefault();
    if(modallikesdisplay.style.display =="none")
    {
      modallikesdisplay.style.display ="block";
    }
    else
    {
      modallikesdisplay.style.display ="none";
    }
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
