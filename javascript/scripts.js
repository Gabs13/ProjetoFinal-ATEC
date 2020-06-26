$(document).ready(function(){
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

var fotoCount = 12;

$(window).scroll(function() {
  if($(window).scrollTop() == ($(document).height() - $(window).height()) * 1) // Scrollbar a 100%
  {
    fotoCount = fotoCount + 4;

    $("#Container_Posts").load("functions/CarregarGaleriaScroll.php", {fotoCount: fotoCount});
  }
});
