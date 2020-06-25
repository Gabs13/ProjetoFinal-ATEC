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
    //BOTAO DE FECHAR MODAL DESCRICAO
    var btnModalDescClose = document.getElementById('modal_descricao_close');



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

    //ABRIR MODAL DE ALTERAR DESCRICAO
    btnmodalDescPerfil.onclick = function()
    {
        if(modalDescPerfil.style.display=="none")
        {
            modalDescPerfil.style.display="block";
        }
        else
        {
            modalDescPerfil.style.display="none";
        }
    }


    //FECHAR MODAL ASEGUIR E SEGUIDORES
    window.onclick = function(event)
    {
        if (event.target == modalPerfil || event.target == btnModalClose)
        {
            modalPerfil.style.display = "none";
            var pos = $(window).scrollTop(); //Saber a posição atual
            window.location.hash = '';
            history.pushState('', document.title, window.location.pathname);
            event.preventDefault();
             $(window).scrollTop(pos); // Dar scroll até à posição que estava

        }

        if (event.target == modalDescPerfil || event.target == btnModalDescClose)
        {
            modalDescPerfil.style.display = "none";
            var pos = $(window).scrollTop(); //Saber a posição atual
            window.location.hash = '';
            history.pushState('', document.title, window.location.pathname);
            event.preventDefault();
             $(window).scrollTop(pos); // Dar scroll até à posição que estava

        }
    }



});