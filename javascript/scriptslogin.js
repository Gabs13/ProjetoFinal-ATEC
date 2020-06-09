$(document).ready(function()
{
  /*BOTAO DE LOGIN -----------------------------------------------------------*/
  $(document).on('click', '#LoginFormB', function(event) {
    event.preventDefault();
    $("#LoginFormA").click();
  });

});//final jquery onload
