$(document).ready(function()
{
  //Modal imagem da galeria
  var displayModalGaleria = document.getElementById('galerydisplay');
  //X para fechar modal
  var span = document.getElementById('close');
  //Modal da galeria
  var modal = document.getElementById('modal');
  //Botão do comentario dentro da modal
  var btncomentario = document.getElementById('btn_comment');
  //OnClick input comentario da modal
  var comentariobottom = document.getElementById('comentario_bottom');
  //Botão imagem user
  var btnuser = document.getElementById('toggle');

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

  /*COMENTARIO MODAL BOTTOM (APARECER A SETA DE ENVIAR) ----------------------*/
  comentariobottom.onclick = function()
  {
    document.getElementById('modal_user_sendbtn').style.display="block";
    document.getElementById('modal_user_sendbtn').style.transition= "1s";
  }

  /*Display de imagens da galeria --------------------------------------------*/
  displayModalGaleria.onclick = function()
  {
      modal.style.display = "block";
  }

  /*FECHAR MODAL -------------------------------------------------------------*/
  //Fechar quando se clica no 'X' ou fora do modal
  window.onclick = function(event)
  {
    if (event.target == modal || event.target == span)
    {
      modal.style.display = "none";
    }
  }

  //Fechar quando a tecla ESC é clickada
  $(document).keydown(function (e) {

    if (e.keyCode == 27) {
        modal.style.display = "none";
    }
  });
  /*FINAL DO DISPLAY DA GALERIA------------------------------------------------*/
});
