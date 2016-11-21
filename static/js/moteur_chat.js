    $(function() {
      var disponible = 1;

      afficheConversationAvecScroll();
      
      $('#envoyer').click(function() {
            var message = $('#message').val();
            disponible = 0;
            $.post('envoyer_message.php',{'msg': message});

            setTimeout(function() {
                obj=document.getElementById("message");
                obj.value=""; 
                afficheConversationAvecScroll;
                disponible = 1;
            }, 1000);
      });

    function scrollDown() {
      var wtf = $('#conversation');
      var height = wtf[0].scrollHeight;
      wtf.scrollTop(height);
    }

    function afficheConversation() {
      $('#conversation').load('../db/discussion.txt');
      //$('#message').focus();
    }

    function afficheConversationAvecScroll() {

      afficheConversation();
      setInterval(scrollDown,50)
      //setTimeout(scrollDown, 100);
    }

    setInterval(afficheConversation, 2000);
  });