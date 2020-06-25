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

    var imgCamera = document.getElementById('img_edit');


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


    /*CLICKAR NO POST E ABRIR MODAL*/
    for (var ctmodal in postImagePerfil)
    {
        postImagePerfil[ctmodal].onclick=function()
        {
            if(postModal.style.display=="none")
            {
                postModal.style.display="block";
            }
            else
            {
                postModal.style.display="none";
            }
        }
    }

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
    window.onclick = function(event)
    {

        if (event.target == modalPerfil || event.target == btnModalClose)
        {
            modalPerfil.style.display = "none";
        }

        if (event.target == postModal || event.target == btnModalPostClose)
        {
            postModal.style.display = "none";
        }
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

          console.log(finalResult);

          $("#perfil_utilizador_info_nome").html(finalResult.User['UtilPNome'] + ' ' + finalResult.User['UtilUNome']);
          $("#perfil_utilizador_info_username").html('@' + finalResult.User['UtilUser']);
          $("#perfil_utilizador_info_descricao").html(finalResult.User['UtilDesc']);

          $("#total_seguidores").html(finalResult.TFollowers);
          $("#total_aseguir").html(finalResult.TFollowing);

          $("#perfil_utilizador_info_btns_seguidores").click(function(){
            totalFollowers(finalResult.User['UtilID']);
          });
        }
      })
    }

    function totalFollowers(id)
    {
      console.log(id);
    }


    var url = new URL(window.location);
    var getid = url.searchParams.get("uname");
    carregarPerfil(getid);
});
