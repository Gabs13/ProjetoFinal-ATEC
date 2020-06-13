$(document).ready(function()
{
  //Modal imagem da galeria
  var displayModalGaleria = document.getElementById('galerydisplay');
  //var displaymodalGaleriaClass = document.getElementsByClassName('collection_container_name');
  //X para fechar modal
  var span = document.getElementById('close');
  //Modal da galeria
  var modal = document.getElementById('modal');
  //Modal direita
  var modalDireita = document.getElementsByClassName('modal_direita')[0];
  //OnClick input comentario da modal
  var comentariobottom = document.getElementById('comentario_bottom');
  //Botão imagem user
  var btnuser = document.getElementById('toggle');
  //botao de settings no comentario
  var btnsettingsModal = document.getElementById('btn_options');
  //span da modal do numero de likes
  var spanLikes = document.getElementById('display_like_post_close');




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

  /**/

  //fechar modal dos likes dos comentarios
  // modalDireita.onclick = function()
  // {
  //   if(document.getElementsByClassName('display_like_background')[0].style.display=="block")
  //   {
  //     document.getElementsByClassName('display_like_background')[0].style.display="none";
  //   }
  // }

  spanLikes.onclick = function()
  {
    document.getElementsByClassName('display_like_background')[0].style.display="none";
  }


  //MODAL

  /*COMENTARIO MODAL BOTTOM (APARECER A SETA DE ENVIAR) ----------------------*/
  comentariobottom.onclick = function()
  {
    document.getElementById('modal_user_sendbtn').style.display="block";
    document.getElementById('modal_user_sendbtn').style.transition= "1s";
  }

  /*Display de imagens da galeria --------------------------------------------*/


  /*FECHAR MODAL -------------------------------------------------------------*/
  //Fechar quando se clica no 'X' ou fora do modal
  window.onclick = function(event)
  {
    if (event.target == modal || event.target == span)
    {
      modal.style.display = "none";
      var pos = $(window).scrollTop(); //Saber a posição atual
      window.location.hash = '';
      history.pushState('', document.title, window.location.pathname);
      event.preventDefault();
      $(window).scrollTop(pos); // Dar scroll até à posição que estava
    }
  }

  //Fechar quando a tecla ESC é clickada
  $(document).keydown(function (e) {

    if (e.keyCode == 27) {
        modal.style.display = "none";
        var pos = $(window).scrollTop(); //Saber a posição atual
        window.location.hash = '';
        history.pushState('', document.title, window.location.pathname);
        e.preventDefault();
        $(window).scrollTop(pos); // Dar scroll até à posição que estava
    }

  });
  /*FINAL DO DISPLAY DA GALERIA------------------------------------------------*/
});

//Tem que ser criado antes do html ser gerado
function getGallery(id)
{

  $.ajax({
    type:"POST",
    url:"functions/functions.php",
    data: {
      action: "getGaleriaPHP",
      id: id,
    },

    success:function(result)
    {
      var finalResult = JSON.parse(result);

      document.getElementById("modal_username_text").innerHTML = finalResult.User[1] + " " + finalResult.User[2]; //Preencher primeiro e ultimo nome no Post

      document.getElementById("modal_user_desc").innerHTML = finalResult.Post[1]; //Preencher descrição foto

      document.getElementsByClassName("modalGallery")[0].style.display="block";

      $("#modal_direita_comentarios").empty();

      $("#modal_direita_comentarios").load("functions/CarregarComentarios.php", {PostID: finalResult.Post[0]});

      parent.location.hash = "?photouser&" + finalResult.User[0]; //Mudar a hash no url

      console.log(finalResult.Post[0]);

      //display da modal e envias os dados pa modal por document.getelement
    }
  });

}

var fotoCount = 12;

$(window).scroll(function() {

  if($(window).scrollTop() >= ($(document).height() - $(window).height()) * 0.8)
  {
    fotoCount = fotoCount + 4;
    $("#Container_Posts").load("functions/CarregarGaleriaScroll.php", {fotoCount: fotoCount});
  }
});
