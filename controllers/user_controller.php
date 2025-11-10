<?php

/**
 * Affiche la page de profil (logique GET)
 */
function user_profile()
{
    // 1. S'assurer que l'utilisateur est connecté
    require_login();

    // 2. Récupérer l'ID de la session
    $user_id = $_SESSION['user_id'];

    // 3. Utiliser le Modèle pour chercher l'utilisateur
    // (On s'assure que cette fonction récupère 'id', 'login', et 'password')
    $user_data = get_user_by_id($user_id);

    // 4. Passer les données à la Vue
    render('user/profile', [
        'user' => $user_data
    ]);
}


/**
 * Traite la mise à jour du profil (logique POST)
 * URL: /user/update_profile
 */
function user_update_profile()
{
    // 1. S'assurer que l'utilisateur est connecté
    require_login();

    // 2. On vérifie si le formulaire est soumis
    if (is_post()) {

        // 3. On récupère TOUTES les données
        $login = post('login');
        $old_password = post('old_password');
        $new_password = post('new_password');
        $user_id = $_SESSION['user_id'];

        // 4. On récupère les infos actuelles de l'utilisateur
        $current_user_data = get_user_by_id($user_id);

        // --- LOGIQUE MOT DE PASSE (Priorité 1) ---
        // On vérifie si l'utilisateur a rempli le champ "nouveau mot de passe"
        if (!empty($new_password)) {

            // Il veut changer son mot de passe. On vérifie l'ancien.
            if (verify_password($old_password, $current_user_data['password'])) {

                // Ancien mot de passe OK. On met à jour la BDD.
                if (update_user_password($user_id, $new_password)) {
                    set_flash('success', 'Votre mot de passe a été mis à jour.');
                } else {
                    set_flash('error', 'Erreur lors de la mise à jour du mot de passe.');
                }

                // Quoi qu'il arrive (succès ou échec BDD), on redirige.
                // Le script s'arrête ici pour le mot de passe.
                redirect('user/profile');
            } else {
                // Ancien mot de passe INCORRECT.
                set_flash('error', 'Votre ancien mot de passe est incorrect.');
                redirect('user/profile');
            }
        }


        // On arrive ici SEULEMENT si l'utilisateur N'A PAS changé son mot de passe.
        // On vérifie si le login tapé est différent de l'actuel.
        if ($login !== $current_user_data['login']) {

            // Le login a changé. On vérifie s'il est déjà pris.
            if (find_user_by_login($login)) {

                // ERREUR : Login déjà pris
                set_flash('error', 'Ce login est déjà utilisé, veuillez en choisir un autre.');
            } else {

                // SUCCÈS : Login libre. On met à jour la BDD.
                if (update_user_login($login, $user_id)) {
                    set_flash('success', 'Votre login a été mis à jour.');

                    // TÂCHE 3 : Mettre à jour la session !
                    $_SESSION['user_login'] = $login;
                } else {
                    set_flash('error', 'Erreur lors de la mise à jour du login.');
                }
            }

            // On redirige vers le profil
            redirect('user/profile');
        }

        // Si rien n'a été changé (ni mdp, ni login), on redirige simplement.
        redirect('user/profile');
    } else {
        // Si ce n'est pas du POST, on renvoie au profil
        redirect('user/profile');
    }
}
