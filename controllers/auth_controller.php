<?php

/**
 * Affiche le formulaire d'inscription ou traite la soumission
 * URL: /auth/inscription
 */
function auth_inscription()
{
    // Si déjà connecté, rediriger
    if (is_logged_in()) {
        redirect('');
    }

    // Si le formulaire est soumis (POST)
    if (is_post()) {
        $login = post('login');
        $password = post('password');
        $password_confirm = post('password_confirm');

        // Validation
        if (empty($login) || empty($password) || empty($password_confirm)) {
            set_flash('error', 'Veuillez remplir tous les champs');
            redirect('auth/inscription');
        }

        if ($password !== $password_confirm) {
            set_flash('error', 'Les mots de passe ne correspondent pas');
            redirect('auth/inscription');
        }

        if (strlen($password) < 6) {
            set_flash('error', 'Le mot de passe doit contenir au moins 6 caractères');
            redirect('auth/inscription');
        }

        // TODO: Créer l'utilisateur dans la base de données
        set_flash('success', 'Inscription réussie ! Vous pouvez vous connecter.');
        redirect('auth/connexion');

        // Créer l'utilisateur dans la base de données
        $user_id = create_user($login, $password);

        if ($user_id) {
            set_flash('success', 'Inscription réussie ! Vous pouvez vous connecter.');
            redirect('auth/connexion');
        } else {
            set_flash('error', 'Une erreur est survenue lors de l\'inscription');
            redirect('auth/inscription');
        }
    }

    // Afficher le formulaire (GET)
    render('auth/inscription', [
        'title' => 'Inscription'
    ]);
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
