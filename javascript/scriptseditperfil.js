$(document).ready(function()
{
    //editarPerfil
    //click no botao de editar
    var editPerfilElement = document.getElementsByClassName('editarPerfil_body_display_edit');
    var caixadeOutput = document.getElementsByClassName('editarPerfil_body_display_container')[0];
    var caixaFull = document.getElementById('editarPerfil_body_display_full');
    var botaodeCancelarEditar = document.getElementsByClassName('btnCancelar');
    var isClicked=false; //flag para desligar e ligar os edits

    /*Função de onclick pagina de editarPerfil para editar elementos*/

    for (var t in editPerfilElement)
    {
            editPerfilElement[t].onclick = function(event)
            {
                if(isClicked==false)
                {
                    isClicked=true;
                    if(this.parentElement.nextElementSibling.style.display=="none")
                    {
                        this.parentElement.style.display="none";
                        this.parentElement.nextElementSibling.style.display="flex";
                        this.parentElement.nextElementSibling.style.transition="1s";
                    }
                }
            }
    }

    /*Funcao para cancelar o editar*/
    for (var z in botaodeCancelarEditar)
    {
        botaodeCancelarEditar[z].onclick = function()
        {
            isClicked=false;
            this.parentElement.parentElement.previousElementSibling.style.display="flex";
            this.parentElement.parentElement.style.display="none";
        }
    }

    carregarInfoEdit();



    $(".editarPerfil_body_display_full").on('input', function(){
      if ($("#tb_tlmv").val().length != 9)
      {
        $("#tb_tlmv").css("border", "2px solid red");
        $("#tb_tlmv").css("outline", "none");
      }
      else {
        $("#tb_tlmv").css("border", "2px solid green");
        $("#tb_tlmv").css("outline", "none");
      }
    });

    document.querySelector("#tb_tlmv").addEventListener("keypress", function (evt) {
      if (this.value.length == 9)
      {
          evt.preventDefault();
      }
    });
});

function atualizarPNome()
{
  var nome = $("#tb_pnome").val();

  if($("#tb_pnome").val().length != 0)
  {
    $.ajax({
      type: "POST",
      url: "functions/functions.php",
      data: {
        action: "atualizarPNomePHP",
        nome: nome,
      },
      success:function(result)
      {
        carregarInfoEdit();

        $("#btnCancelar1").trigger("click");

        $("#tb_pnome").val("");
      }
    });
  }
}

function atualizarUNome()
{
  var unome = $("#tb_unome").val();

  if($("#tb_unome").val().length != 0)
  {
    $.ajax({
      type: "POST",
      url: "functions/functions.php",
      data: {
        action: "atualizarUNomePHP",
        nome: unome,
      },
      success:function(result)
      {
        carregarInfoEdit();

        $("#btnCancelar2").trigger("click");

        $("#tb_unome").val("");
      }
    });
  }
}

function atualizarDesc()
{
  var desc = $("#tb_desc").val();

  if($("#tb_desc").val().length != 0)
  {
    $.ajax({
      type: "POST",
      url: "functions/functions.php",
      data: {
        action: "atualizarDescPHP",
        desc: desc,
      },
      success:function(result)
      {
        carregarInfoEdit();

        $("#btnCancelar3").trigger("click");

        $("#tb_desc").val("");
      }
    });
  }
}

function atualizarTlmv()
{
  var tlmv = $("#tb_tlmv").val();

  if($("#tb_tlmv").val().length == 9)
  {
    $.ajax({
      type: "POST",
      url: "functions/functions.php",
      data: {
        action: "atualizarTlmvPHP",
        tlmv: tlmv,
      },
      success:function(result)
      {
        carregarInfoEdit();

        $("#btnCancelar4").trigger("click");

        $("#tb_tlmv").val("");
      }
    });
  }
}

function atualizarGen()
{
  var gen = $('input[name=bt_gen]:checked').val()

  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: "atualizarGenPHP",
      gen: gen,
    },
    success:function(result)
    {
      carregarInfoEdit();

      $("#btnCancelar5").trigger("click");
    }
  });
}

function carregarInfoEdit()
{
  $.ajax({
    type: "POST",
    url: "functions/functions.php",
    data: {
      action: 'carregarInfoEditPHP',
    },
    success:function(result)
    {
      var finalResult = JSON.parse(result);


      $("#lb_pnome").html(finalResult.Info['UtilPNome']);
      $("#tb_pnome").attr("placeholder", finalResult.Info['UtilPNome']);

      $("#lb_unome").html(finalResult.Info['UtilUNome']);
      $("#tb_unome").attr("placeholder", finalResult.Info['UtilUNome']);


      $("#lb_desc").html(finalResult.Info['UtilDesc']);
      $("#tb_desc").attr("placeholder", finalResult.Info['UtilDesc']);


      $("#lb_tlmv").html(finalResult.Info['Telemovel']);
      $("#tb_tlmv").attr("placeholder", finalResult.Info['Telemovel']);

      if (finalResult.Info['UtilGenero'] == 1)
      {
        $("#lb_genero").html("Masculino");
        $("#radio_bt_M").attr("checked", "checked");
      }
      else if (finalResult.Info['UtilGenero'] == 2)
      {
        $("#lb_genero").html("Feminino");
        $("#radio_bt_F").attr("checked", "checked");
      }
    }
  });
}
