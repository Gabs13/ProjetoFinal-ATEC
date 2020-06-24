$(document).ready(function()
{
    //MODAL DE SEGUIDORES NO PERFIL
    var modalPerfil = document.getElementById('modal_perfil');
    //BOTAO LIGAR MODAL
    var btnSeguidores = document.getElementById('perfil_utilizador_info_btns_seguidores');
    //BOTAO DE FECHAR 
    var btnModalClose = document.getElementById('perfil_modal_close');

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
    }


});