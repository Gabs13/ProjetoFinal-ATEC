$(document).ready(function()
{
  //modal imagem da galeria
  var displayModalGaleria = document.getElementById('galerydisplay');
  //X para fechar modal
  var span = document.getElementById('close');
  //modal da galeria
  var modal = document.getElementById('modal');
  //botao do comentario dentro da modal
  var btncomentario = document.getElementById('btn_comment');
  //onclick input comentario da modal
  var comentariobottom = document.getElementById('comentario_bottom');
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

  //CLICK BOTAO COMENTARIO MODAL
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

  //COMENTARIO MODAL BOTTOM (APARECER A SETA DE ENVIAR)
  comentariobottom.onclick = function()
  {
    document.getElementById('modal_user_sendbtn').style.display="block";
    document.getElementById('modal_user_sendbtn').style.transition= "1s";
  }

  /*display de imagens da galeria1-----------------------------------*/
  displayModalGaleria.onclick = function()
  {
      modal.style.display = "block";
  }

  //FECHAR MODAL
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
