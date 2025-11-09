<?php

/**
 * Récupère tous les commentaires avec le login de l'auteur,
 * classés du plus récent au plus ancien.
 */
function get_all_comments_with_details()
{
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


    return db_select($query);
}


/**
 * Insère un nouveau commentaire dans la base de données.
 */
function create_comment($commentaire, $user_id)
{

    $query = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?, ?, NOW())";

    return db_execute($query, [$commentaire, $user_id]);
}
