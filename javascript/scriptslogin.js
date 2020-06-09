$(document).ready(function()
{
  /*BOTAO DE LOGIN -----------------------------------------------------------*/
  $(document).on('click', '#LoginFormB', function(event) {
    event.preventDefault();
    $("#LoginFormA").click();
  });
});//final jquery onload

function login()
{
  var email = $('#logMail').val();
  var password = $('#logPass').val();

  if (email != '' || password != '')
  {

    $.ajax({
      type:"POST",
      url:"functions/functions.php",
      data: {
        action:'entrar',
        email:email,
        password:password,
      },

      success:function(result)
      {
        var datajson = jQuery.parseJSON(result);

        location.href = "login.php";
      }
    });
  }
}
