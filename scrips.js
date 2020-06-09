$(document).ready(function()
{
  var uuu = document.getElementById('galerydisplay');
  var span = document.getElementById('close');
  var modal = document.getElementById('modal');
  var btncomentario = document.getElementById('btn_comment');
  var comentariobottom = document.getElementById('comentario_bottom');
  //segunda modal
  var galeria2 = document.getElementById('galerydisplay2');
  //Botão imagem user
  var btnuser = document.getElementById('toggle');

  btnuser.onclick = function()
  {
    var padtop;
    padtop = $('html, body').css('padding-top');

    if (padtop == '50px')
    {
      $('html, body').css('padding-top', '0px')
    }
    else
    {
      $('html, body').css('padding-top', '50px')
    }
  }

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

  comentariobottom.onclick = function()
  {
    document.getElementById('modal_user_sendbtn').style.display="block";
    document.getElementById('modal_user_sendbtn').style.transition= "1s";
  }

  /*display de imagens da galeria1-----------------------------------*/
  uuu.onclick = function()
  {
      modal.style.display = "block";
  }

  //Display de imagens da galeria2------------------------------------------
  galeria2.onclick= function()
  {
    modal.style.display = "block";
  }



  window.onclick = function(event)
  {
    if (event.target == modal || event.target == span)
    {
      modal.style.display = "none";
    }
  }
  /*FINAL DO DISPLAY DA GALERIA------------------------------------------*/

});//final jquery onload


/*BOTAO DE LOGIN*/
$(document).ready(function () {
   $('#LoginFormB').click(function () {
      $('#LoginFormA').click();
   });
 });
