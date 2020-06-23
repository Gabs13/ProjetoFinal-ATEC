//Botão imagem user
var btnuser = document.getElementById('toggle');
//dropdownlist button
var dropdownnav = document.getElementById('dropdownlistNavbar');
var btnDropdownlist = document.getElementsByClassName('navbar_menu_dropdown')[0];

  /*Funcao para mostrar dropdownlist nav bar*/
  dropdownnav.onclick = function()
  {
    if(btnDropdownlist.style.display=="none")
    {
      btnDropdownlist.style.display="block";
    }
    else
    {
      btnDropdownlist.style.display="none";
    }
  }


  /*Empurrar body para baixo quando se abre navbar ---------------------------*/

  btnuser.onclick = function()
  {
    var padtop;
    padtop = $('html, body').css('padding-top');

    if (padtop == '50px')
    {
      //Animação puxar body para cima
      $('html, body').animate({paddingTop: 0}, 750);
    }
    else
    {
      //Animação empurrar body para baixo
      $('html, body').animate({paddingTop: 50}, 250);
    }
  }
