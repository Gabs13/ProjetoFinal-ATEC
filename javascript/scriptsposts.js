$(document).ready(function()
{
    // botao de preview imagem
    var imgPreviewbtn = document.getElementById('post_img');
    // Prewview da imagem do post
    var imgPreview = document.getElementById('imgpreview');
    //Texto Preview
    var textPreview = document.getElementById('home_post_example_border_text');
    //Caixa de texto
    var descPreview = document.getElementById('home_post_create_container_texto_1');


    $(".home_post_create_container").on('input', function(){
      var desc = $("#home_post_create_container_texto_1").val();

      $("#modal_user_desc_preview").html(desc);

    });

    $(document).on('click', '#post_img', function(event) {
      event.preventDefault();
      $("#post_img_file_1").click();

      $("#post_send_file_2").prop( "disabled", false);
    });

    $(document).on('click', '#post_send', function(event) {
      event.preventDefault();
      $("#post_send_file_2").click();
    });

    const inpFile = document.getElementById('post_img_file_1');
    const previewContainer = document.getElementById('modal_esquerda_preview');
    const previewImage = previewContainer.querySelector('.image_preview');

    inpFile.addEventListener("change", function(){
      const file = this.files[0];


      if (file)
      {
        const reader = new FileReader();

        reader.addEventListener("load", function() {
          previewImage.setAttribute("src", this.result);
          imgPreview.style.display="flex";
          textPreview.style.display="block";
          document.getElementById('home_post_example').style.display = "flex";
          descPreview.disabled = false;
        });

        reader.readAsDataURL(file);
      }


    })
});
