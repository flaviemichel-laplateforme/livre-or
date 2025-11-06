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

function find_user_by_login($login)
{
    $query = "SELECT id FROM utilisateurs WHERE login = ?";

    // db_select() retourne un tableau (vide ou non)
    $user_data = db_select($query, [$login]);

    // !empty() est le test parfait.
    // Si $user_data N'EST PAS vide, ça retourne true (l'utilisateur existe).
    return !empty($user_data);
}

// ... (et on a toujours ta fonction create_user) ...