/* Variables globales */
var envoiMessage   = false;
var positionScroll = 0;

<<<<<<< HEAD


=======
>>>>>>> 2b0d6ab16dc53192b095db7bc901d5fe070ae5a1
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
<<<<<<< HEAD
  $("#listeUtilisateur").load("recuperer_connectes.php",function(){});
}

setInterval(function() {
  recharger(false);
},1000);
=======
  $("#listeUtilisateurs").load("recuperer_connectes.php",function(){});
}

setInterval(recharger(false),1000);
>>>>>>> 2b0d6ab16dc53192b095db7bc901d5fe070ae5a1

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


