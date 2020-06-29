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

//botao abrir notficações
var notificationbtn= document.getElementById('notification_bar_btn');
//lista de notificações
var notificationbar = document.getElementById('notificacao_container');
//balao de texto notificaçao
var notificationNotice = document.getElementsByClassName('post_creation_text')[0];

//funcao para abrir barra de notificações
notificationbtn.onclick=function()
{
  if(notificationbar.style.display=="none")
  {
    notificationbar.style.display="block";
    notificationNotice.style.display="none"
  }
  else
  {
    notificationbar.style.display="none";
    notificationNotice.style.display="block"
  }
}


//fechar notificaçoes
  $(document).mouseup(function(e)
  {
    var container = $("#notificacao_container");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
      container.hide();
    }
  });

getFoto();

$(document).ready(function(){
  addbtn.onclick=function()
  {
    if(modaladdpost.style.display=="none")
    {
      modaladdpost.style.display="block";
      document.getElementById('home_post_example').style.display = "none";
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

function contarNotificacoes()
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: "contarNotificacoesPHP",
    },
    success:function(result)
    {
      var finalResult = JSON.parse(result);

      if (finalResult.Notificacao > 9)
      {
        $("#notification_nr").html("9+");
      }
      else
      {
        $("#notification_nr").html(finalResult.Notificacao);
      }

      setTimeout(contarNotificacoes, 2000);
    }
  });
}

contarNotificacoes();

function getNotificacoes()
{
  $("#notificacao_container").load("functions/CarregarNotificacoes.php");

  setTimeout(lerNotificacao, 500);
}

function lerNotificacao()
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: "NotificacaoLida",
    },
    success:function()
    {

    }
  });
}

function getFoto()
{
  $.ajax({
    type: "POST",
    url:"functions/functions.php",
    data:{
      action: "getFotoPHP",
    },
    success:function(result)
    {
      var finalResult = JSON.parse(result);

      if(finalResult.info['UtilFoto'] != null)
      {
        $("#img_navbar").attr("src", "imagens/Utilizadores/" + finalResult.info['UtilFoto']);
      }
      else
      {
        $("#img_navbar").attr("src", "imagens/Icones/icons8-male-user-26.png");
      }
    }
  });
}
