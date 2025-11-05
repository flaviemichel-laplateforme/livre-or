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
