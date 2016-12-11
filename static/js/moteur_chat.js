/* Variables globales */

var positionScroll = 0;
var first          = 1; /* Pour faire un scroll down du chat au premier chargement*/

function recharger(messagee)
{
  $positionScroll = $('#conversation').scrollTop();
  $tailleDuHaut   = $('#conversation').height();

  $tailleDuChat   = $('#conversation')[0].scrollHeight;

  $("#conversation").load("recuperer_conversation.php",function()
    {
      if ( ($positionScroll + $tailleDuHaut == $tailleDuChat) || messagee == true || first == 1 )
      {
        first = 0;
        scrollDown();
      }
    });
  $("#listeUtilisateurs").load("recuperer_connectes.php",function(){});
}

setInterval(function() {
  recharger(false);
},1000);

function envoyerMessage() {

      alert("Début:" + document.getElementById("message").innerHTML + "/");

    	var message = document.getElementById("message").innerHTML;
    	$.post('envoyer_message.php',{'msg': message});

      recharger(true);

      /* Effacer zone texte */
      document.getElementById("message").innerHTML = ""

      alert("Fin:"+document.getElementById("message").innerHTML+"/");
}

$('#envoyer').click(function(){
	envoyerMessage()
});

function scrollDown() {
    var wtf = $('#conversation');
    var height = wtf[0].scrollHeight;
    wtf.scrollTop(height);
}

function commande(nom, argument) {
  if (typeof argument === 'undefined') {
    argument = '';
  }
  // Exécuter la commande
  document.execCommand(nom, false, argument);
}

function toucheEntreeDetectee() 
{
  if (document.getElementById('CACentree').checked == true)
  {
    envoyerMessage();
  }
  alert("Touche entree detectee:"+document.getElementById("message").innerHTML+"/");
}
