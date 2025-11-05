<?php
// Contrôleur d'authentification

/**
 * Affiche le formulaire de connexion ou traite la soumission
 * URL: /auth/connexion
 */
function auth_connexion()
{
    // Si déjà connecté, rediriger
    if (is_logged_in()) {
        redirect('');
    }

    // Si le formulaire est soumis (POST)
    if (is_post()) {
        $login = post('login');
        $password = post('password');

        // Validation basique
        if (empty($login) || empty($password)) {
            set_flash('error', 'Veuillez remplir tous les champs');
            redirect('auth/connexion');
        }

        // TODO: Vérifier les identifiants dans la base de données
        // Pour l'instant, on simule une connexion réussie
        $_SESSION['user_id'] = 1;
        $_SESSION['user_login'] = $login;

        set_flash('success', 'Connexion réussie !');
        redirect('');
    }

    // Afficher le formulaire (GET)
    render('auth/connexion', [
        'title' => 'Connexion'
    ]);
}

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
