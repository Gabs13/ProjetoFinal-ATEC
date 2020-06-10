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
  //botao de like modal
  var btnLikeModal = document.getElementById('btn_like');
  //botao de settings no comentario
  var btnsettingsModal = document.getElementById('btn_options');
  //index das settings
  var indexSettings = document.getElementsByClassName('modal_hidden_options');
  //botao das settings i
  var settingI = document.getElementById('optionsbuttonI');
  //botao numero de likes comentarios modal
  
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
 
  /**/
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


  //MODAL 
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
