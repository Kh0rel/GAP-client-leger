function getCommandeWaiting() {

    $.ajax({
        type: "get",
        url: $.get(Routing.generate('')),
        data: "message="+message,
        success: function(msg){
            // Si la réponse est true, tout s'est bien passé,
            // Si non, on a une erreur et on l'affiche
            if(msg == true) {
                // On vide la zone de texte
                $("#message").val('');
                $("#responsePost").slideUp("slow").html('');
            } else
                $("#responsePost").html(msg).slideDown("slow");
            // on resélectionne la zone de texte, en cas d'utilisation du bouton "Envoyer"
            $("#message").focus();
        },
        error: function(msg){
            // On alerte d'une erreur
            alert('Erreur');
        }
    });

}