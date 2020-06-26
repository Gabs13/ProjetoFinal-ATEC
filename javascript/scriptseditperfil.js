$(document).ready(function()
{
    //editarPerfil
    //click no botao de editar
    var editPerfilElement = document.getElementsByClassName('editarPerfil_body_display_edit');
    var caixadeOutput = document.getElementsByClassName('editarPerfil_body_display_container')[0];
    var caixaFull = document.getElementById('editarPerfil_body_display_full');
    var botaodeCancelarEditar = document.getElementsByClassName('btnCancelar');
    var isClicked=false; //flag para desligar e ligar os edits

    /*Função de onclick pagina de editarPerfil para editar elementos*/
    console.log(editPerfilElement);


    for (var t in editPerfilElement)
    {
        console.log(isClicked);
            editPerfilElement[t].onclick = function(event)
            {
                if(isClicked==false)
                {
                    isClicked=true;
                    if(this.parentElement.nextElementSibling.style.display=="none")
                    {
                        this.parentElement.style.display="none";
                        this.parentElement.nextElementSibling.style.display="flex";
                        this.parentElement.nextElementSibling.style.transition="1s";
                    }
                }
            }


    }

    /*Funcao para cancelar o editar*/
    for (var z in botaodeCancelarEditar)
    {
        botaodeCancelarEditar[z].onclick = function()
        {
            isClicked=false;
            console.log(this.parentElement.parentElement.previousElementSibling);
            this.parentElement.parentElement.previousElementSibling.style.display="flex";
            this.parentElement.parentElement.style.display="none";
        }
    }
});
