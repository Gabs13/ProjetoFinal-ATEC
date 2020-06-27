//Botão imagem user
var btnuser = document.getElementById('toggle');
//dropdownlist button
var dropdownnav = document.getElementById('dropdownlistNavbar');

var btnDropdownlist = document.getElementsByClassName('navbar_menu_dropdown')[0];

//botao de pesquisa
var searchbar = document.getElementById('procura');
//botao de adicionar
var addbtn = document.getElementById('add_posts_nav');
var modaladdpost = document.getElementById('modal_criar_post');
var closepostcreate = document.getElementById('modal_criar_post_close');


$(document).ready(function(){
  addbtn.onclick=function()
  {
    if(modaladdpost.style.display=="none")
    {
      modaladdpost.style.display="block";
    }
    else
    {
      modaladdpost.style.display="none";
    }

  }

});

$(window).click(function(event)
{
  if (event.target == document.getElementById('home_main') || event.target == closepostcreate || event.target == modaladdpost || event.target == document.getElementById('home_post_example_border') || event.target == document.getElementById('form_preview'))
  {
    modaladdpost.style.display="none";
  }
});

$(document).ready(function(){
  $(".procura").mouseenter(function(){
    $(".buscar-txt").css("width", "140px");
    $(".buscar-txt").css("padding", "0 6px");
  });

  $(".buscar-txt").focusout(function(){
    $(".buscar-txt").css("width", "0px");
    $(".buscar-txt").css("padding", "0 0px");
  });
});

/*Funcao para mostrar dropdownlist nav bar*/
dropdownnav.onclick = function()
{
  if(btnDropdownlist.style.display=="none")
  {
    btnDropdownlist.style.display="block";
  }
  else
  {
    btnDropdownlist.style.display="none";
  }
}


/*Empurrar body para baixo quando se abre navbar ---------------------------*/
btnuser.onclick = function()
{
  var padtop;
  padtop = $('html, body').css('padding-top');

  if (padtop == '50px')
  {
    //Animação puxar body para cima
    $('html, body').animate({paddingTop: 0}, 750);
  }
  else
  {
    //Animação empurrar body para baixo
    $('html, body').animate({paddingTop: 50}, 250);
  }
}
