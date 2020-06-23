$(document).ready(function()
{
    // botao de preview imagem
    var imgPreviewbtn = document.getElementById('post_img');
    // Prewview da imagem do post
    var imgPreview = document.getElementById('imgpreview');
    //caixa com border
    var borderPreview = document.getElementById('home_post_example_border');
    //Texto Preview
    var textPreview = document.getElementById('home_post_example_border_text');

    //FUNCAO PARA ABRIR A IMAGEM PREVIEW NO POST
    imgPreviewbtn.onclick = function()
    {
        if(imgPreview.style.display=="none")
        {
            imgPreview.style.display="flex";
            borderPreview.style.border="1px solid #ccc";
            borderPreview.style.margin="10px";
            textPreview.style.display="block";
        }
        else
        {
            imgPreview.style.display="none";
        }
    }


    $(".home_post_create_container").on('input', function(){

      var desc = $("#home_post_create_container_texto").val();

      console.log(desc);

      $("#modal_user_desc").html(desc);

    });

    $(document).on('click', '#post_img', function(event) {
      event.preventDefault();
      $("#post_img_file").click();
    });


});
