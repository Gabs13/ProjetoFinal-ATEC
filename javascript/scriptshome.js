var url = new URL(window.location);
var getuser = url.searchParams.get("uname");
var getid = url.searchParams.get("uid");

$(document).ready(function()
{
  //BOTAO DE FECHAR MODAL DE SEGUIDORES E A SEGUIR
  var btnModalClose = document.getElementById('perfil_modal_close');
  //BOTAO FECHAR MODAL
  var btnModalPostClose = document.getElementById('closePerfil');
});

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

      $("#modal_user_username").html('<a style="text-decoration: none; color: #D24D57;" href="perfil.php?&uname=' + finalResult.User['UtilUser'] + '&uid=' + finalResult.User['UtilID'] +'"> @' + finalResult.User['UtilUser'] + '</a>');

      if(finalResult.User['UtilFoto'] != null)
      {
        $("#autor_modal_user_img").attr("src", "imagens/Utilizadores/" + finalResult.User['UtilFoto']);
      }
      else
      {
        $("#autor_modal_user_img").attr("src", "imagens/Icones/icons8-male-user-26.png");
      }

      document.getElementById("modal_user_desc").innerHTML = finalResult.Post[1]; //Preencher descrição foto

      if (document.getElementsByClassName("modalGallery")[0] != null)
      {
        document.getElementsByClassName("modalGallery")[0].style.display="block";
      }

      $("#modal_direita_comentarios").empty();

      $("#modal_direita_comentarios").load("functions/CarregarComentarios.php", {PostID: finalResult.Post[0]});

      history.pushState('', document.title, '?pid=' + finalResult.Post[0] + '&uid=' + finalResult.User[0]);

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

var fotoCountHome = 20;

$(window).scroll(function() {
  if($(window).scrollTop() == ($(document).height() - $(window).height()) * 1) // Scrollbar a 100%
  {
    fotoCountHome = fotoCountHome + 20;

    $("#Container_Posts").load("functions/CarregarHomeScroll.php", {fotoCount: fotoCountHome});
  }
});
