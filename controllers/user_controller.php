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

// Fichier : controllers/user_controller.php

function update_profile()
{
    if (is_post()) {
        $login = post('login');
        $old_password = post('old_password');
        $new_password = post('new_password');
        $user_id = $_SESSION['user_id'];

        if (!empty($new_password)) {

            $current_user_data = get_user_by_id($user_id);

            if (verify_password($old_password, $current_user_data['password'])) {

                // ===================================
                // SUCCÈS : L'ancien mot de passe est bon.
                // ===================================

                // On appelle la fonction du Modèle pour mettre à jour la BDD
                if (update_user_password($user_id, $new_password)) {
                    // La BDD a été mise à jour avec succès
                    set_flash('success', 'Votre mot de passe a été mis à jour.');
                } else {
                    // Il y a eu une erreur lors de la mise à jour BDD
                    set_flash('error', 'Une erreur est survenue lors de la mise à jour du mot de passe.');
                }

                // Dans tous les cas (succès ou erreur BDD), on redirige vers le profil
                redirect('user/profile');
            } else {
                // ERREUR : L'ancien mot de passe est incorrect.
                set_flash('error', 'Votre ancien mot de passe est incorrect.');
                redirect('user/profile');
            }
        }
        // 5. On gère le changement de login
        // ...

    } else {
        redirect('user/profile');
    }
}

// (On a aussi l'autre fonction)
function profile()
{
    // ... (tout le code pour afficher la page de profil)
}
