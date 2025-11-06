<?php

function user_profile()
{
    // 1. Vérifier si l'utilisateur est connecté (et le rediriger sinon)
    require_login();

    // --- Si on arrive ici, c'est que l'utilisateur EST connecté ---

    // 2. Récupérer l'ID de la session
    $user_id = $_SESSION['user_id'];

    // 3. Utiliser le Modèle pour chercher l'utilisateur
    $user_data = get_user_by_id($user_id);

    // 4. Passer les données à la Vue
    render('user/profile', [
        'user' => $user_data
    ]);
}

// Fichier : controllers/user_controller.php

function update_profile()
{
    // 1. On vérifie si le formulaire est soumis
    if (is_post()) {

        // 2. On récupère les 3 données du formulaire
        $login = post('login');
        $old_password = post('old_password');
        $new_password = post('new_password');

        // ... C'est ici qu'on va mettre la logique de mise à jour ...

    } else {
        // Si quelqu'un arrive sur cette URL en GET
        redirect('user/profile');
    }
}

// (On a aussi l'autre fonction)
function profile()
{
    // ... (tout le code pour afficher la page de profil)
}
