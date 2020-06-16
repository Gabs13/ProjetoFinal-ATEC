var firebaseConfig = {
  apiKey: "AIzaSyBQuYvZkipYHoPGtVnTMJ8Q19qgIcNW5FY",
  authDomain: "silken-champion-276618.firebaseapp.com",
  databaseURL: "https://silken-champion-276618.firebaseio.com",
  projectId: "silken-champion-276618",
  storageBucket: "silken-champion-276618.appspot.com",
  messagingSenderId: "461809954753",
  appId: "1:461809954753:web:e2cbbb3fa2da8e6224c940",
  measurementId: "G-P0P82JPHR0"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

function sendMessage()
{
  //Get Mensagem
  var message = document.getElementById("tb_messagem").value;
  var hoje = new Date();
  var data = hoje.getDate() + "-" + hoje.getMonth() + "-" + hoje.getFullYear();
  var hora = hoje.getHours();
  if (hoje.getMinutes() > 10)
  {
    hora = hora + ':' + hoje.getMinutes();
  }
  else {
    hora = hora + ':0' + hoje.getMinutes();
  }
  hora = hora + ':' + hoje.getSeconds();

  var dataHora = data + " " + hora;
  //Guardar no firebase
  firebase.database().ref("mensagens" + NomeSessao + UNSessao + IDSessao + "/mensagens").push().set({
    "sender": IDSessao,
    "message": message,
    "datamsg": dataHora
  });
  return false;
}

//Receber mensagens
firebase.database().ref("mensagens" + NomeSessao + UNSessao + IDSessao + "/mensagens").on("child_added", function (snapshot){
  if (snapshot.val().sender == IDSessao)
  {
    var html = "";

    html += '<div class="chat_display_messages_ocupy">'
    html +=    '<div class="chat_display_messages_display">'
    html +=        '<div class="chat_display_messages_nome">' + NomeSessao + ' ' + UNSessao +'</div>'
    html +=        '<div class="chat_display_messages_texto">' + snapshot.val().message + '</div>'
    html +=        '<div class="chat_display_messages_hora">' + snapshot.val().datamsg + '</div>'
    html +=    '</div>'
    html += '</div>';
  }
  else
  {
    var html = "";
    html += '<div class="chat_display_messages_ocupy">'
    html +=    '<div class="chat_display_messages_display_left">'
    html +=        '<div class="chat_display_messages_nome">' + snapshot.val().sender + '</div>'
    html +=        '<div class="chat_display_messages_texto">' + snapshot.val().message + '</div>'
    html +=        '<div class="chat_display_messages_hora">' + snapshot.val().datamsg + '</div>'
    html +=    '</div>'
    html += '</div>';
  }

  document.getElementById("chat_display_messages").innerHTML += html;

  $('#enviarMSG').val('');
});
