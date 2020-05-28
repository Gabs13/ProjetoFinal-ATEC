$(document).ready(function()
{
    var uuu= document.getElementById('galerydisplay');
    var span = document.getElementById('close');
    var modal = document.getElementById('modal');

  function postCreate()
  {

  }

  /*display de imagens da galeria1-----------------------------------*/
  uuu.onclick = function() {
      modal.style.display = "block";
  }

  window.onclick = function(event) {
    if (event.target == modal || event.target == span) {
      modal.style.display = "none";
    }
  }
  /*FINAL DO DISPLAY DA GALERIA------------------------------------------*/

});//final jquery onload
