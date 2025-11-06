<?php

function profile()
{
    // 1. Vérifier si l'utilisateur est connecté (et le rediriger sinon)
    require_login();

    // --- Si on arrive ici, c'est que l'utilisateur EST connecté ---

    // 2. Récupérer l'ID de la session
    $user_id = $_SESSION['user_id'];

    // 3. Utiliser le Modèle pour chercher l'utilisateur
    $user_data = get_user_by_id($user_id);

    // 4. Passer les données à la Vue
    render('profile/profil', [
        'user' => $user_data
    ]);
}
