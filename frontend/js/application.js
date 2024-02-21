"use strict";
(function($) {
    /**
     * 1. Détecter lorsque l'utilisateur change la valeur du champ select
     * 2. On récupère la valeur de sn choix et on la multiplie par le prix du circuit qu'on aura mis 
     * dans une variable au préalable.
     * 3. On affiche le résultat du produit.
     */
    /* Récupération du prix initial du circuit */
    var prixCircuit = $('#prix').val();
    var nombrePassager = $('#nombre');
    /* Détection du changement sur le champ Formule */
    nombrePassager.on('change', function() {
        /* Récupération de la valeur du champ */
        var valeurNombrePassager = parseInt($(this).val());
        /* Les différents cas de figure */
        switch(valeurNombrePassager) {
            case 1:
            case 2:
            case 3:
                /* Calcul du prix total */
                var prixTotal = prixCircuit * valeurNombrePassager;
                /* Assignation de la valeur dans le champ dédié */
                $('#prix_total').val(prixTotal);
                break;
            default:
                /* Affichage d'un message d'erreur en cas d'une mauvaise sélection de l'utilisateur */
                $('#erreur-nombre').html("Veuillez choisir une formule !");
                break;
        }
    });
})(jQuery);