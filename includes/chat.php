<body>
  <div class="chat_body">
      <div class="chat_users">

        <!--SEARCHBOX-->
        <div class="chat_users_settings">
            <div class="chat_user_settings_search_padding">
                <div class="chat_user_settings_search">
                    <input type="text" id="PesquisaNome" placeholder="Insira um Utilizador...">
                    <i class="fas fa-search"></i>

                    <script type="text/javascript">
                      $(function() {
                          $("#PesquisaNome").autocomplete({source: function( request, response ) {
                                  $.ajax({
                                      url: "functions/teste.php",
                                      dataType: "jsonp",
                                      data: {
                                        nome: request.term
                                      },
                                      success: function(result) {
                                        console.log(result);
                                        //finalResult = jQuery.parseJSON(result);
                                        //response(result);

                                      }
                                  });
                              },
                          });
                      });
                    </script>
                </div>
            </div>
        </div>
        <!--FINAL SEARCHBOX-->


          <div class="chat_users_display">
              <!--MENSAGEM DE UM UTILIZADOR-->
              <div class="chat_users_display_user">
                  <div class="chat_users_display_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                  <div class="chat_users_display_info">
                      <div class="chat_users_display_user_nome"><?php devolverNome(5); ?></div>
                      <div class="chat_users_display_user_mensagem">Queres ver o meu honda?</div>
                  </div>
              </div>
              <!--FINAL-->
          </div>

      </div>
      <div class="chat_display">
          <div class="chat_display_user">
              <div class="chat_display_user_profile">
                  <div class="chat_display_user_img"><a><img src="Imagens/Icones/icons8-male-user-26.png"></a></div>
                  <div class="chat_display_user_name">Ruben do Tuning</div>
              </div>
          </div>

          <div class="chat_display_messages" id="chat_display_messages">
              <!--<div class="chat_display_messages_ocupy">
                  <div class="chat_display_messages_display">
                      <div class="chat_display_messages_nome">Armando Nunes</div>
                      <div class="chat_display_messages_texto">Nao gostei do teu honda ruben, é roubado e deita fumo</div>
                      <div class="chat_display_messages_hora">16:04</div>
                  </div>
              </div>

              <div class="chat_display_messages_ocupy">
                  <div class="chat_display_messages_display_left">
                      <div class="chat_display_messages_nome">Armando Nunes</div>
                      <div class="chat_display_messages_texto">Nao gostei do teu honda ruben, é roubado e deita fumo</div>
                      <div class="chat_display_messages_hora">16:04</div>
                  </div>
              </div>-->
          </div><!--FINAL DO DISPLAY DAS MENSAGENS-->




          <div class="chat_display_text">
              <div class="chat_display_text_msg" >
                <form onsubmit="return sendMessage();">
                  <input type="text" id="tb_messagem" autofocus autocomplete="off" placeholder="Escreva a sua mensagem...">
                  <button type="submit" class="chat_display_text_send"><i class="fas fa-paper-plane"></i></button>
                </form>
              </div>

          </div>
      </div>
  <div>
</body>
