$(document).ready(function()
{
    var uuu= document.getElementById('galerydisplay1');
    var span = document.getElementById('close1');
    var modal = document.getElementById('modal1');

    var uuu2= document.getElementById('galerydisplay2');
    var span2 = document.getElementById('close2');
    var modal2 = document.getElementById('modal2');

  function postCreate()
  {
      
  }

  /*display de imagens da galeria1-----------------------------------*/


  uuu.onclick = function() {
      modal.style.display = "block";
  }

  span.onclick = function() {
      console.log(modal);
      //modal.style.display = "none";
      document.getElementById('modal1').style.display='none';
      
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  /*FINAL DO DISPLAY DA GALERIA------------------------------------------*/



  /*Display galeria 2------------------------------ */ 
  uuu2.onclick = function() 
  {
    modal2.style.display = "block";
  }

  span2.onclick = function() 
  {
      console.log(modal2);
      //modal.style.display = "none";
      document.getElementById('modal2').style.display='none';
  }
  window.addEventListener("click", function(event)
  {
    if (event.target == modal2) 
    {
      modal2.style.display = "none";
    }
  });
      

  /*FIM GALERIA2--------------------*/ 

});//final jquery onload

