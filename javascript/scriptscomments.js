$(document).ready(function()
{
  //botao das settings i
  var settingI = document.getElementsByClassName('optionsbuttonI');
  //index das settings
  //var indexSettings = document.getElementsByClassName('modal_hidden_options')[0];
  var indexSettingsID = document.getElementsByClassName('modal_hidden_options');
  //botao numero de likes comentarios modal
  var likenumberButton = document.getElementsByClassName('modal_comentario_buttons_likes');
  //botao de like modal
  var btnLikeModal = document.getElementById('btn_like');
  //
  var modallikesdisplay = document.getElementById('display_like_background');
  //Span da modal do numero de likes
  var spanLikes = document.getElementById('display_like_post_close');
  //Total Likes Post
  var totalLikes = document.getElementById('autor_modal_info_likes');
  //OnClick input comentario da modal
  var comentariobottom = document.getElementById('comentario_bottom');
  //X para fechar modal
  var span = document.getElementById('closePerfil');
  //Modal da galeria
  var modal = document.getElementById('modalperfilpost');
  //Modal direita
  var modalDireita = document.getElementsByClassName('modal_direita')[0];

  //Icon like da modal principal
  var mainmodalLike= document.getElementById('likePostModal');

  totalLikes.onclick = function()
  {
    if(modallikesdisplay.style.display == "none")
    {
      modallikesdisplay.style.display = "block";
    }
    else
    {
      modallikesdisplay.style.display ="none";
    }
  }

  /*COMENTARIO MODAL BOTTOM (APARECER A SETA DE ENVIAR) ----------------------*/
  comentariobottom.onfocus = function()
  {
    document.getElementById('modal_user_sendbtn').style.display="block";
    document.getElementById('modal_user_sendbtn').style.transition= "1s";
  }

  /*FECHAR A MODAL DOS SETTINGS FORA DA JANELA*/
  $(window).click(function(event){
    if(event.target.id == $("#modal_content"))
    {
      $("#modal_hidden_options_id").css("display", "none");
    }
  });

  //Fechar quando se clica no 'X' ou fora do modal
  window.onclick = function(event)
  {
    if (event.target == modal || event.target == span)
    {
      modal.style.display = "none";
      var pos = $(window).scrollTop(); //Saber a posição atual
      if(getuser == null || getid == null)
      {
        history.replaceState('', document.title, window.location.pathname);
      }
      else
      {
        history.replaceState('', document.title, "perfil.php?&uname=" + getuser + "&uid=" + getid);
      }

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
        if(getuser == null || getid == null)
        {
          history.replaceState('', document.title, window.location.pathname);
        }
        else
        {
          history.replaceState('', document.title, "perfil.php?&uname=" + getuser + "&uid=" + getid);
        }
        e.preventDefault();
        $(window).scrollTop(pos); // Dar scroll até à posição que estava

        document.getElementById('modal_user_sendbtn').style.display="none";
        document.getElementById('modal_user_sendbtn').style.transition= "1s";

        $('#comentario_bottom').val('');
    }

  });


  for(var i of settingI)
  {
    i.onclick= function()
    {
      if(this.nextElementSibling.style.display =="none")
      {
        for(var l of indexSettingsID)
        {
          l.style.display="none";
        }
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

  for(var e of likenumberButton)
  {
    e.onclick = function(event)
    {
      event.preventDefault();
      if(modallikesdisplay.style.display == "none")
      {
        modallikesdisplay.style.display = "block";
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
});

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
