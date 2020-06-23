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
    //Caixa de texto
    var descPreview = document.getElementById('home_post_create_container_texto');


    $(".home_post_create_container").on('input', function(){
      var desc = $("#home_post_create_container_texto").val();

      $("#modal_user_desc").html(desc);

    });

    $(document).on('click', '#post_img', function(event) {
      event.preventDefault();
      $("#post_img_file").click();
    });

    $(document).on('click', '#post_send', function(event) {
      event.preventDefault();
      $("#post_send_file").click();
    });

    const inpFile = document.getElementById('post_img_file');
    const previewContainer = document.getElementById('modal_esquerda');
    const previewImage = previewContainer.querySelector('.image_preview');

    inpFile.addEventListener("change", function(){
      const file = this.files[0];


      if (file)
      {
        const reader = new FileReader();

        reader.addEventListener("load", function() {
          previewImage.setAttribute("src", this.result);
          imgPreview.style.display="flex";
          borderPreview.style.border="1px solid #ccc";
          borderPreview.style.margin="10px";
          textPreview.style.display="block";
          descPreview.disabled = false;
        });

        reader.readAsDataURL(file);
      }


    })
});
