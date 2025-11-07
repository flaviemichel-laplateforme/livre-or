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


function auth_connexion()
{
    // 1. On vérifie si le formulaire est soumis
    if (is_post()) {

        // 2. On récupère les données
        $login = post('login');
        $password = post('password');

        // 3. On demande au Modèle de trouver l'utilisateur
        $user = get_user_by_login($login); // Renvoie 'false' ou un tableau ['id'=>..., 'login'=>...]

        // 4. On vérifie la réponse du Modèle
        if ($user && verify_password($password, $user['password'])) {

            // ===================================
            // CAS 1 : SUCCÈS ! 
            // $user existe ET le mot de passe est bon
            // ===================================

            // On crée les variables de session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_login'] = $user['login'];

            // On met un message de bienvenue
            set_flash('success', 'Connexion réussie ! Bienvenue ' . escape($user['login']));

            // On redirige vers l'accueil (comme demandé dans ton issue)
            redirect('home/index'); // ou juste 'index.php'

        } else {

            // ===================================
            // CAS 2 : ÉCHEC
            // Soit $user est false (login inconnu)
            // Soit le mot de passe est mauvais
            // ===================================

            // On met le message d'erreur sécurisé et générique
            set_flash('error', 'Login ou mot de passe incorrect.');
        }
    }

    // 5. Si ce n'est pas du POST (ou si l'échec CAS 2 est arrivé),
    //    on affiche la page de connexion. Le header affichera l'erreur.
    render('auth/connexion');
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
