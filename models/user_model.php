<?php

function create_user($login, $password)
{

    $hashed_password = hash_password($password);
    $query = "INSERT INTO utilisateurs (login,password) VALUES (? ,? ) ";

    if (db_execute($query, [$login, $hashed_password])) {
        return db_last_insert_id();
    }
    return false;
}

// Fichier : models/user_model.php

/**
 * Récupère un utilisateur par son login pour la connexion.
 * Retourne les données de l'utilisateur (tableau) si trouvé,
 * sinon retourne false.
 */
function get_user_by_login($login)
{
    $query = "SELECT id, login, password FROM utilisateurs WHERE login = ?";

    // $result est un tableau de lignes
    $result = db_select($query, [$login]);

    if (empty($result)) {
        // Cas 1 : Utilisateur non trouvé
        return false;
    } else {
        // Cas 2 : Utilisateur trouvé, on retourne la première ligne
        return $result[0];
    }
}
