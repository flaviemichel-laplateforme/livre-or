<?php

/**
 * Affiche le formulaire d'inscription ou traite la soumission
 * URL: /auth/inscription
 */
function auth_inscription()
{
    // 1. On vérifie si le formulaire est soumis en POST
    if (is_post()) {

        // 2. On récupère les données
        $login = post('login');
        $password = post('password');
        $confirm_password = post('confirm_password');

        // 3. On commence les vérifications
        if ($password !== $confirm_password) {
            // ERREUR 1 : Mots de passe non identiques
            set_flash('error', 'Les mots de passe ne correspondent pas.');
            redirect('auth/inscription');
        } elseif (empty($login) || empty($password) || empty($confirm_password)) {
            // ERREUR 2 : Champs vides
            set_flash('error', 'Veuillez remplir tous les champs.');
            redirect('auth/inscription');
        } elseif (find_user_by_login($login)) {
            // ERREUR 3 : Le login existe déjà (la fonction a retourné TRUE)
            set_flash('error', 'Ce login est déjà pris, veuillez en choisir un autre.');
            redirect('auth/inscription');
        } else {
            // TOUT EST OK : On crée l'utilisateur
            $nouvel_utilisateur_id = create_user($login, $password);

            if ($nouvel_utilisateur_id) {
                // SUCCÈS : L'utilisateur est créé
                set_flash('success', 'Votre compte a été créé avec succès ! Vous pouvez maintenant vous connecter.');

                // 4. On redirige vers la page de connexion
                redirect('auth/connexion');
            } else {
                // ERREUR 4 : Problème BDD
                set_flash('error', 'Une erreur est survenue lors de la création du compte.');
                redirect('auth/inscription');
            }
        }
    }

    // 5. Si ce n'est pas du POST (ou si une erreur est survenue), 
    //    on affiche la page d'inscription.
    render('auth/inscription');
}


/**
 * Déconnexion
 * URL: /auth/deconnexion
 */
function auth_deconnexion()
{
    session_destroy();
    redirect('');
}
