$(document).ready(function()
{
  /*BOTAO DE LOGIN -----------------------------------------------------------*/
  $(document).on('click', '#LoginFormB', function(event) {
    event.preventDefault();
    $("#LoginFormA").click();
  });
});//final jquery onload

document.querySelector("#regNome").addEventListener("keypress", function (evt) {
  if (evt.which < 65 || evt.which > 90 && evt.which < 97 || evt.which > 122 && evt.which < 192 || evt.which > 255 )
  {
      evt.preventDefault();
  }
});

document.querySelector("#regUNome").addEventListener("keypress", function (evt) {
  if (evt.which < 65 || evt.which > 90 && evt.which < 97 || evt.which > 122 && evt.which < 192 || evt.which > 255 )
  {
      evt.preventDefault();
  }
});

document.querySelector("#regPass").addEventListener("keypress", function (evt) {
  if (evt.which < 65 || evt.which > 90 && evt.which < 97 || evt.which > 122)
  {
      evt.preventDefault();
  }
});

document.querySelector("#regRPass").addEventListener("keypress", function (evt) {
  if (evt.which < 65 || evt.which > 90 && evt.which < 97 || evt.which > 122)
  {
      evt.preventDefault();
  }
});

document.querySelector("#regTlmv").addEventListener("keypress", function (evt) {
  if (this.value.length == 9)
  {
      evt.preventDefault();
  }
});


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

        console.log(datajson['sessao']);
        console.log(datajson['nome']);
        console.log(datajson['sobrenome']);
      }
    });
  }
}
