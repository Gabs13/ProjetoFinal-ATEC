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

        if (JSON.stringify(datajson) === JSON.stringify({sucesso: "1"}))
        {
          location.href = "login.php";
        }
        else
        {
          alert("Conta não existe!");
        }


      }
    });
  }
}

//funcao para mudar as cores dos inputs
function inputColor()
  {
      document.getElementById("logMail").style.border="1px solid #D24D57";
      document.getElementById("logPass").style.border="1px solid #D24D57";
  }
