$(document).ready(function()
{
    // botao de preview imagem
    var imgPreviewbtn = document.getElementById('post_img');
    // Prewview da imagem do post
    var imgPreview = document.getElementById('imgpreview');


    //FUNCAO PARA ABRIR A IMAGEM PREVIEW NO POST
    imgPreviewbtn.onclick = function()
    {
        if(imgPreview.style.display=="none")
        {
            imgPreview.style.display="flex";
        }
        else
        {
            imgPreview.style.display="none";
        }
    }



});