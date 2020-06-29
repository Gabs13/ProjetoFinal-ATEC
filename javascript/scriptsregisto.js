document.querySelector("#regNome").addEventListener("keypress", function (evt) {
  if (evt.which < 65 || evt.which > 90 && evt.which < 97 || evt.which > 122 && evt.which < 192 || evt.which > 255 )
  {console.log("entrou username");
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
  if (evt.which != 46 && evt.which < 48 || evt.which > 57 && evt.which < 65 || evt.which > 90 && evt.which != 95 && evt.which < 97 || evt.which > 122)
  {
      evt.preventDefault();
  }
});

document.querySelector("#regRPass").addEventListener("keypress", function (evt) {
  if (evt.which != 46 && evt.which < 48 || evt.which > 57 && evt.which < 65 || evt.which > 90 && evt.which != 95 && evt.which < 97 || evt.which > 122)
  {
      evt.preventDefault();
  }
});

document.querySelector('[name="regUsername"]').addEventListener("keypress", function (evt) {
//name="regUsername"
  if (evt.which != 46 && evt.which < 48 || evt.which > 57 && evt.which < 65 || evt.which > 90 && evt.which != 95 && evt.which < 97 || evt.which > 122)
  {
      evt.preventDefault();
  }
});

document.getElementById("regData").max = "2002-01-01";


//BOTAO DE REGISTO
$(document).ready(function()
{
  /*BOTAO DE LOGIN -----------------------------------------------------------*/
  $(document).on('click', '#registobtn2', function(event) {
    event.preventDefault();
    $("#registobtn1").click();
  });

});//final jquery onload
