/* Variables globales */
var envoiMessage   = false;
var positionScroll = 0;

function recharger(messagee)
{
  $positionScroll = $('#conversation').scrollTop();
  $tailleDuHaut   = $('#conversation').height();

  $tailleDuChat   = $('#conversation')[0].scrollHeight;

  $("#conversation").load("recuperer_conversation.php",function()
    {
      if ( ($positionScroll + $tailleDuHaut == $tailleDuChat) || messagee == true )
      {
        scrollDown();
      }
    });
  $("#listeUtilisateurs").load("recuperer_connectes.php",function(){});
}

setInterval(recharger(false),1000);

function envoyerMessage() {
	if (envoiMessage == false)
    	var message = $('#message').val();
    	$.post('envoyer_message.php',{'msg': message});

      /* Effacer zone texte */
      document.getElementById("message").value = ""
      
      recharger(true);

}

$('#envoyer').click(function(){
	envoyerMessage()
});

function scrollDown() {
    var wtf = $('#conversation');
    var height = wtf[0].scrollHeight;
    wtf.scrollTop(height);
}


