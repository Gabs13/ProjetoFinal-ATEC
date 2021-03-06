var url = new URL(window.location);
var getuser = url.searchParams.get("uname");
var getid = url.searchParams.get("uid");

$(document).ready(function()
{
    //MODAL DE SEGUIDORES NO PERFIL
    var modalPerfil = document.getElementById('modal_perfil');
    //MODAL DE MUDAR DESCRICAO NO PERFIL
    var modalDescPerfil = document.getElementById('modal_descricao');
    //BOTAO ABRIR MODAL DE DESCRICAO
    var btnmodalDescPerfil = document.getElementById('botaoDescPerfil');
    //BOTAO LIGAR MODAL SEGUIDORES
    var btnSeguidores = document.getElementById('perfil_utilizador_info_btns_seguidores');
    //BOTAO DE LIGAR MODAL A SEGUIR
    var btnAseguir = document.getElementById('perfil_utilizador_info_btns_aseguir');
    //BOTAO DE FECHAR MODAL DE SEGUIDORES E A SEGUIR
    var btnModalClose = document.getElementById('perfil_modal_close');
    //BOTAO FECHAR MODAL
    var btnModalPostClose =document.getElementById('closePerfil');
    //IMGAEM DO POST
    var postImagePerfil = document.getElementsByClassName('perfil_galeria_post');
    //modal do post
    var postModal = document.getElementById('modalperfilpost');
    //BOTAO DE SEGUIR
    var followbtn = document.getElementById('perfil_utilizador_info_btns_followbtn');
    //BOTAO DE FECHAR MODAL DE EDICAO DE FOTO
    var closeeditfoto = document.getElementById('modal_edicao_foto_container_img_close');


    var imgCamera = document.getElementById('img_edit');

    const inpFile = document.getElementById('post_img_file');
    const previewContainer = document.getElementById('modal_edicao_foto_container_img');
    const previewImage = previewContainer.querySelector('.perfil_utilizador_imagem_img');

    $("#perfil_utilizador_imagem_img").click(function(event){
      $("#img_edit").click();
    });

    $(window).click(function(event) {
      if (event.target == document.getElementById('modal_edicao_foto') || event.target == closeeditfoto)
      {
        $("#modal_edicao_foto").css('display', 'none');
        previewImage.setAttribute("src", document.getElementById("perfil_utilizador_imagem_img").getAttribute('src'));
      }
    });

    $("#modal_edicao_foto_file").on('click', function(event) {
      event.preventDefault();
      $("#post_img_file").click();
    });

    $("#modal_edicao_foto_bt").on('click', function(event) {
      event.preventDefault();
      $("#post_send_file").click();
    });

    $(document).keydown(function (e) {
      if (e.keyCode == 27) {
          $("#modal_edicao_foto").css('display', 'none');
      }
    });


    inpFile.addEventListener("change", function(){
      const file = this.files[0];

      if (file)
      {
        const reader = new FileReader();

        reader.addEventListener("load", function() {
          previewImage.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
      }
    })

    /*ABRIR MODAL DE SEGUIDORES*/
    btnSeguidores.onclick = function()
    {
        if(modalPerfil.style.display=="none")
        {
            modalPerfil.style.display="block";
        }
        else
        {
            modalPerfil.style.display="none";
        }
    }

    /*ABRIR MODAL A SEGUIR*/
    btnAseguir.onclick = function()
    {
        if(modalPerfil.style.display=="none")
        {
            modalPerfil.style.display="block";
        }
        else
        {
            modalPerfil.style.display="none";
        }
    }

    //FECHAR MODAL ASEGUIR E SEGUIDORES
    $(window).click(function(event)
    {
        if (event.target == modalPerfil || event.target == btnModalClose)
        {
            modalPerfil.style.display = "none";
        }
    });

    var eliminatemodal = document.getElementById('chat_eliminatemodal');
    var eliminatebtn = document.getElementById('closemodalEliminar');
    var eliminatebtnNO = document.getElementById('chat_eleminatemodal_btns_no');
    //fechar modal de eliminar posts

    $(window).click(function(event){
      if ( event.target == eliminatemodal ||event.target == eliminatebtn || event.target == eliminatebtnNO)
      {
        $("#chat_eliminatemodal").css('display', 'none');
      }
    });


    carregarPerfil(getuser);

});

//abrir modal de eliminar posts
function eliminatePost() {
  console.log("entrou func");
  $("#chat_eliminatemodal").css('display', 'block');

}


function totalFollowers(id)
{
  $("#modal_perfil_container_main").load("functions/CarregarTotalFollowers.php", {id: id});
  $("#modal_perfil_container_title").html("Seguidores");
}

function totalFollowing(id)
{
  $("#modal_perfil_container_main").load("functions/CarregarTotalFollowing.php", {id: id});

  $("#modal_perfil_container_title").html("A seguir");
}

function carregarPerfil(nome)
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data:{
      action: "carregarPerfilPHP",
      nome: nome,
    },
    success:function(result)
    {
      var finalResult = JSON.parse(result);

      if(finalResult.User['UtilFoto'] == null)
      {
        $("#perfil_utilizador_imagem_img").attr("src", 'imagens/Icones/icons8-male-user-26.png');

        $("#perfil_utilizador_preview_img").attr("src", 'imagens/Icones/icons8-male-user-26.png');
      }
      else
      {
        $("#perfil_utilizador_imagem_img").attr("src", 'imagens/Utilizadores/' + finalResult.User['UtilFoto']);

        $("#perfil_utilizador_preview_img").attr("src", 'imagens/Utilizadores/' + finalResult.User['UtilFoto']);
      }



      $("#perfil_utilizador_info_nome").html(finalResult.User['UtilPNome'] + ' ' + finalResult.User['UtilUNome']);
      $("#perfil_utilizador_info_username").html('@' + finalResult.User['UtilUser']);
      $("#perfil_utilizador_info_descricao").html(finalResult.User['UtilDesc']);

      $("#total_seguidores").html(finalResult.TFollowers);
      $("#total_aseguir").html(finalResult.TFollowing);
      $("#total_posts").html(finalResult.TPosts);

      $("#perfil_utilizador_info_btns_seguidores").click(function(){
        totalFollowers(finalResult.User['UtilID']);
      });

      $("#perfil_utilizador_info_btns_aseguir").click(function(){
        totalFollowing(finalResult.User['UtilID']);
      });

      if(finalResult.Seguir == true)
      {
        $("#perfil_utilizador_info_btns_followbtn").css("border", "1px solid #cc3b46");
        $("#perfil_utilizador_info_btns_followbtn").css("background-color", "white");
        $("#perfil_utilizador_info_btns_followbtn").css("color", "#cc3b46");
        $("#perfil_utilizador_info_btns_followbtn").html('A Seguir <i class="fas fa-check"></i>');
      }
      else
      {
        $("#perfil_utilizador_info_btns_followbtn").css("border", "");
        $("#perfil_utilizador_info_btns_followbtn").css("background-color", "#cc3b46");
        $("#perfil_utilizador_info_btns_followbtn").css("color", "white");
        $("#perfil_utilizador_info_btns_followbtn").html('Seguir');
      }

      $("#perfil_galeria").html('<div class="loading_perfil"> <img src="imagens/Icones/loadingperfil.gif"> </div>');

      $("#perfil_galeria").load("functions/CarregarFotosPerfil.php", {UserID: finalResult.User['UtilID']});

      if (finalResult.User['UtilID'] == finalResult.IDSessao)
      {
        //Hover on da animação na foto de perfil
        $("#perfil_utilizador_imagem").find( "img" ).mouseenter(function(){
          $("#perfil_utilizador_imagem_img").css('transform', 'scale(1.5)');
          $("#perfil_utilizador_imagem_img").css('-webkit-filter', 'brightness(50%)');
          $("#perfil_utilizador_imagem_img").css('-webkit-transition:', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('-moz-transition:', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('-o-transition', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('-ms-transition', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('transition', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('cursor', 'pointer');
        });

        //Hover out da animação na foto de perfil
        $("#perfil_utilizador_imagem").find( "img" ).mouseleave(function(){
          $("#perfil_utilizador_imagem_img").css('transform', '');
          $("#perfil_utilizador_imagem_img").css('-webkit-filter', '');
          $("#perfil_utilizador_imagem_img").css('-webkit-transition:', '');
          $("#perfil_utilizador_imagem_img").css('-moz-transition:', '');
          $("#perfil_utilizador_imagem_img").css('-o-transition', '');
          $("#perfil_utilizador_imagem_img").css('-ms-transition', '');
          $("#perfil_utilizador_imagem_img").css('transition', '');
          $("#perfil_utilizador_imagem_img").css('cursor', '');
        });

        //Hover on da animação na foto de perfil
        $("#perfil_utilizador_imagem").mouseenter(function(){
          $("#img_edit").css('display', 'block');
        });

        //Hover out da animação na foto de perfil
        $("#perfil_utilizador_imagem").mouseleave(function(){
          $("#img_edit").css('display', 'none');
        });

        //Hover on da animação na foto de perfil
        $("#img_edit").mouseenter(function(){
          $("#perfil_utilizador_imagem_img").css('transform', 'scale(1.5)');
          $("#perfil_utilizador_imagem_img").css('-webkit-filter', 'brightness(50%)');
          $("#perfil_utilizador_imagem_img").css('-webkit-transition:', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('-moz-transition:', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('-o-transition', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('-ms-transition', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('transition', 'all 1s ease');
          $("#perfil_utilizador_imagem_img").css('cursor', 'pointer');

          $("#img_edit").css('cursor', 'pointer');
        });

        //Hover out da animação na foto de perfil
        $("#img_edit").mouseleave(function(){
          $("#perfil_utilizador_imagem_img").css('transform', '');
          $("#perfil_utilizador_imagem_img").css('-webkit-filter', '');
          $("#perfil_utilizador_imagem_img").css('-webkit-transition:', '');
          $("#perfil_utilizador_imagem_img").css('-moz-transition:', '');
          $("#perfil_utilizador_imagem_img").css('-o-transition', '');
          $("#perfil_utilizador_imagem_img").css('-ms-transition', '');
          $("#perfil_utilizador_imagem_img").css('transition', '');
          $("#perfil_utilizador_imagem_img").css('cursor', '');

          $("#img_edit").css('cursor', '');
        });

        //Função para abrir a modal para alterar a fotografia de perfil
        $("#img_edit").click(function(event){
          if ($("#modal_edicao_foto").css('display') == 'none')
          {
            $("#modal_edicao_foto").css('display', 'block');
          }
        });


      }
    }
  })
}

function apagarPost(id)
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: "apagarPostPHP",
      id: id,
    },
    success:function(result)
    {
      var finalResult = JSON.parse(result);

      history.replaceState('', document.title, "perfil.php?&uname=" + getuser + "&uid=" + getid);

      $("#total_posts").html(finalResult.TPosts);

      $("#modalperfilpost").css('display', 'none');

      $("#chat_eliminatemodal").css('display', 'none');

      $("#perfil_galeria").html('<div class="loading_perfil"> <img src="imagens/Icones/loadingperfil.gif"> </div>');

      $("#perfil_galeria").load("functions/CarregarFotosPerfil.php", {UserID: finalResult.User['UtilID']});
    }
  });
}

/*Funcao para seguir*/
function getSeguir(id)
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data:{
      action: "seguirPHP",
      id: id,
    },
    success:function(result)
    {
      var finalResult = JSON.parse(result);

      if(finalResult.Seguir == true)
      {
        $("#perfil_utilizador_info_btns_followbtn").css("border", "1px solid #cc3b46");
        $("#perfil_utilizador_info_btns_followbtn").css("background-color", "white");
        $("#perfil_utilizador_info_btns_followbtn").css("color", "#cc3b46");
        $("#perfil_utilizador_info_btns_followbtn").html('A Seguir <i class="fas fa-check"></i>');

        $("#total_seguidores").html(finalResult.TFollowers);
        $("#total_aseguir").html(finalResult.TFollowing);
      }
      else
      {
        $("#perfil_utilizador_info_btns_followbtn").css("border", "");
        $("#perfil_utilizador_info_btns_followbtn").css("background-color", "#cc3b46");
        $("#perfil_utilizador_info_btns_followbtn").css("color", "white");
        $("#perfil_utilizador_info_btns_followbtn").html('Seguir');

        $("#total_seguidores").html(finalResult.TFollowers);
        $("#total_aseguir").html(finalResult.TFollowing);
      }
    }

  });
}

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

      if(finalResult.User['UtilFoto'] != null)
      {
        $("#autor_modal_user_img").attr("src", "imagens/Utilizadores/" + finalResult.User['UtilFoto']);
      }
      else
      {
        $("#autor_modal_user_img").attr("src", "imagens/Icones/icons8-male-user-26.png");
      }

      document.getElementById("modal_username_text").innerHTML = finalResult.User[1] + " " + finalResult.User[2]; //Preencher primeiro e ultimo nome no Post

      $("#modal_user_username").html('<a style="text-decoration: none; color: #D24D57;" href="perfil.php?&uname=' + finalResult.User['UtilUser'] + '&uid=' + finalResult.User['UtilID'] +'"> @' + finalResult.User['UtilUser'] + '</a>');

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

      $("#chat_eleminatemodal_btns_yes").attr('onclick', 'apagarPost('+ finalResult.Post[0] +')');

      if(finalResult.User['UtilID'] == finalResult.Sessao)
      {
        $("#settings").html('<div class="chat_msgs_settings_btn"><i class="fas fa-ellipsis-h"></i><div class="chat_users_display_settings_modal" id="chat_users_display_settings_modal" onclick="eliminatePost()">Eliminar</div></div>');
      }
    }
  });
}
