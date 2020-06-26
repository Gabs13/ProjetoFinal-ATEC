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

  //Botão de settings no comentario
  var btnsettingsModal = document.getElementById('btn_options');

  //Icon like da modal principal
  var mainmodalLike= document.getElementById('likePostModal');

  //MODAL

  /*COMENTARIO MODAL BOTTOM (APARECER A SETA DE ENVIAR) ----------------------*/
  comentariobottom.onfocus = function()
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

      document.getElementById('modal_user_sendbtn').style.display="none";
      document.getElementById('modal_user_sendbtn').style.transition= "1s";

      $('#comentario_bottom').val('');
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

        document.getElementById('modal_user_sendbtn').style.display="none";
        document.getElementById('modal_user_sendbtn').style.transition= "1s";

        $('#comentario_bottom').val('');
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

      document.getElementById("modal_esquerda").innerHTML = '<img src="/ProjetoFinal/imagens/posts/' + finalResult.Foto[0] + '">';

      document.getElementById("modal_username_text").innerHTML = finalResult.User[1] + " " + finalResult.User[2]; //Preencher primeiro e ultimo nome no Post

      document.getElementById("modal_user_desc").innerHTML = finalResult.Post[1]; //Preencher descrição foto

      if (document.getElementsByClassName("modalGallery")[0] != null)
      {
        document.getElementsByClassName("modalGallery")[0].style.display="block";
      }

      $("#modal_direita_comentarios").empty();

      $("#modal_direita_comentarios").load("functions/CarregarComentarios.php", {PostID: finalResult.Post[0]});

      //window.location.hash = '?photouser=' + finalResult.User[0];
      //history.replaceState(null, null, ' ');

      history.pushState('', document.title, '?pid=' + finalResult.Post[0] + '&uid=' + finalResult.User[0]);

      //parent.location.hash = "?photouser=" + finalResult.User[0]; //Mudar a hash no url

      document.getElementById("modal_user_sendbtn").innerHTML = '<i onclick="addComment('+ finalResult.Post[0] +');" class="fas fa-location-arrow"></i>';

      $("#autor_modal_info_likes").empty();

      $("#autor_modal_info_likes").load("functions/CarregarLikesPost.php", {PostID: finalResult.Post[0]});

      if(finalResult.Like == true)
      {
        document.getElementById("autor_modal_info_btn").innerHTML = '<i class="fas fa-heart" id="likePostModal" onclick="likePost(' + finalResult.Post[0] + ');">';
        $("#likePostModal").css('color', '#D24D57');
      }
      else
      {
        document.getElementById("autor_modal_info_btn").innerHTML = '<i class="fas fa-heart" id="likePostModal" onclick="likePost(' + finalResult.Post[0] + ');">';
      }
    }
  });
}

function addComment(id)
{
  var comentario = $('#comentario_bottom').val();

  //localStorage.removeItem('ComentarioFinal');

  if (comentario != "")
  {
    var firstWord = $('#comentario_bottom').val().substr(0, $('#comentario_bottom').val().indexOf(" "));

    var comentarioID = localStorage.getItem('ComentarioID');

    var a = $('#comentario_bottom').val();

    var username = a.slice(1, $("#comentario_bottom").val().indexOf(" "));


    $.ajax({
      type: "POST",
      url: "functions/functions.php",
      data: {
        action: "getInfoUserPHP",
        nome: username,
      },
      success:function(result)
      {
        var finalResult = JSON.parse(result);

        localStorage.removeItem('ComentarioFinal');

        var uid = finalResult['Info'];

        var b, c;

        b = '<a class="identificacao" href="perfil.php?&uname=' + username + '&uid=' + uid + '">';
        c = '</a>';
        var comentariofinal = [b, a.slice(0, $("#comentario_bottom").val().indexOf(" ")), c, a.slice($("#comentario_bottom").val().indexOf(" "))].join('');

        localStorage.setItem('ComentarioFinal', comentariofinal);
      }
    });


    if (firstWord == localStorage.getItem('NomeReply') && localStorage.getItem('ComentarioID') !== null)
    {
      setTimeout(function(){
        var comentariofinal = window.localStorage.getItem('ComentarioFinal');
        $.ajax({
          type: "POST",
          url:"functions/functions.php",
          data: {
            action: "replyCommentPHP",
            postid: id,
            id: comentarioID,
            comentario: comentariofinal,
          },

          success:function(result)
          {
            var finalResult = JSON.parse(result);

            $("#modal_direita_comentarios").load("functions/CarregarComentarios.php", {PostID: finalResult.Post});

            $('#comentario_bottom').val('');

          }
        });

      }, 400);

    }
    else
    {
      $.ajax({
        type: "POST",
        url:"functions/functions.php",
        data: {
          action: "addCommentPHP",
          id: id,
          comentario: comentario,
        },

        success:function(result)
        {
          var finalResult = JSON.parse(result);

          $("#modal_direita_comentarios").load("functions/CarregarComentarios.php", {PostID: finalResult.Post[0]});

          $('#comentario_bottom').val('');
        }
      });
    }
  }

  localStorage.clear();
}

function removeComment(id)
{

  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: "removeCommentPHP",
      id: id,
    },

    success:function(result)
    {
      var finalResult = JSON.parse(result);

      $("#modal_direita_comentarios").load("functions/CarregarComentarios.php", {PostID: finalResult.Post[1]});
    }
  });
}

function likePost(id)
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: "likePostPHP",
      id: id,
    },

    success:function(result)
    {
      var finalResult = JSON.parse(result);

      if(finalResult.Like == true)
      {
        document.getElementById("autor_modal_info_btn").innerHTML = '<i class="fas fa-heart" id="likePostModal" onclick="likePost(' + finalResult.Post + ');">';
        $("#likePostModal").css('color', '#D24D57');
      }
      else
      {
        document.getElementById("autor_modal_info_btn").innerHTML = '<i class="fas fa-heart" id="likePostModal" onclick="likePost(' + finalResult.Post + ');">';
      }

      $("#autor_modal_info_likes").empty();

      $("#autor_modal_info_likes").load("functions/CarregarLikesPost.php", {PostID: finalResult.Post});
    }
  })
}

function likeComment(id)
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: "likeCommentPHP",
      id: id,
    },

    success:function(result)
    {
      var finalResult = JSON.parse(result);

      if(finalResult.Like == true)
      {
        var comentarioID = "#Comment" + finalResult.Comentario;

        $(comentarioID).css('color', '#D24D57');

        $(comentarioID).unbind('mouseenter mouseleave')

        var likeCount = "#modal_comentario_buttons_likes" + finalResult.Comentario;

        $(likeCount).load("functions/ContarLikesComments.php", {ComentarioID: finalResult.Comentario});
      }
      else
      {
        var comentarioID = "#Comment" + finalResult.Comentario;

        $(comentarioID).css('color', '#000');

        $(comentarioID).hover(function(){$(comentarioID).css('color', '#D24D57');}, function(){$(comentarioID).css('color', '#000');})

        var likeCount = "#modal_comentario_buttons_likes" + finalResult.Comentario;

        $(likeCount).load("functions/ContarLikesComments.php", {ComentarioID: finalResult.Comentario});
      }
    }
  })
}

function replyComment(id)
{
  var comentario = $('#comentario_bottom').val('');
  localStorage.setItem('ComentarioID', id);

  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: "getReplyCommentUserPHP",
      id: id,
    },

    success:function(result)
    {
      var finalResult = JSON.parse(result);

      $('#comentario_bottom').val('@' + finalResult.Util[2] + ' ');
      localStorage.setItem('NomeReply', '@' + finalResult.Util[2]);
    }
  })
}

function totalUsersLikes(id)
{
  $("#display_like_post_scroll").empty();

  $("#display_like_post_scroll").load("functions/UsersLikesComments.php", {ComentarioID: id});
}

function totalUsersLikesPosts(id)
{
  $("#display_like_post_scroll").load("functions/UsersLikesPosts.php", {PostID: id});
}

var fotoCount = 12;

$(window).scroll(function() {
  if($(window).scrollTop() == ($(document).height() - $(window).height()) * 1) // Scrollbar a 100%
  {
    fotoCount = fotoCount + 4;

    $("#Container_Posts").load("functions/CarregarGaleriaScroll.php", {fotoCount: fotoCount});
  }
});
