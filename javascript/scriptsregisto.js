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

document.querySelector("#regTlmv").addEventListener("keypress", function (evt) {
  if (this.value.length == 9)
  {
      evt.preventDefault();
  }
});


//BOTAO DE REGISTO
$(document).ready(function()
{
  /*BOTAO DE LOGIN -----------------------------------------------------------*/
  $(document).on('click', '#registobtn2', function(event) {
    event.preventDefault();
    $("#registobtn1").click();
  });
});//final jquery onload