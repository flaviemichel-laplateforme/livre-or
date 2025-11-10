<?php

/**
 * Affiche la page d'accueil
 * URL: /
 */
function home_index()
{
    // Récupérer les 3 derniers commentaires pour l'aperçu
    $query = "
        SELECT 
            commentaires.commentaire, 
            commentaires.date, 
            utilisateurs.login 
        FROM 
            commentaires 
        LEFT JOIN 
            utilisateurs ON commentaires.id_utilisateur = utilisateurs.id 
        ORDER BY 
            commentaires.date DESC
        LIMIT 3
    ";
    $recent_comments = db_select($query);

    $data = [
        'title' => 'Accueil - Livre d\'Or',
        'message' => 'Bienvenue sur notre livre d\'or',
        'recent_comments' => $recent_comments
    ];

    render('home/index', $data);
}
