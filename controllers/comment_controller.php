<?php

/**
 * Affiche la page du livre d'or (la liste des commentaires)
 * URL: /comment/livre_or
 */
function comment_livre_or()
{
    // 1. Récupérer tous les commentaires du Modèle
    $comments = get_all_comments_with_details();

    // 2. Envoyer ces données à la Vue pour affichage
    render('comment/livre_or', [
        'comments' => $comments
    ]);
}

// (Vous ajouterez d'autres fonctions comme comment_create() ici plus tard)