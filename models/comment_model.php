<?php

// Fichier : models/comment_model.php

/**
 * Récupère tous les commentaires avec le login de l'auteur,
 * classés du plus récent au plus ancien.
 */
function get_all_comments_with_details()
{
    // 1. La requête SQL
    $query = "
        SELECT 
            commentaires.id, 
            commentaires.commentaire, 
            commentaires.date, 
            utilisateurs.login 
        FROM 
            commentaires 
        LEFT JOIN 
            utilisateurs ON commentaires.id_utilisateur = utilisateurs.id 
        ORDER BY 
            commentaires.date DESC
    ";

    // 2. Exécuter et retourner les résultats
    return db_select($query);
}

// ... (vos autres fonctions de modèle)