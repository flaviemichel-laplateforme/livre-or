<?php
// Fichier : controllers/auth_controller.php

function auth_inscription()
{
    if (is_post()) {
        $login = post('login');
        $password = post('password');
        $confirm_password = post('confirm_password');

        if ($password !== $confirm_password) {
            set_flash('error', 'Les mots de passe ne correspondent pas.');
        } elseif (empty($login) || empty($password)) {
            set_flash('error', 'Veuillez remplir tous les champs.');
        } else {
            // LES MOTS DE PASSE SONT BONS, LES CHAMPS SONT REMPLIS
            // C'est ici qu'on doit travailler.

            // ... Que fait-on maintenant ? ...
        }
    }

    render('auth/inscription');
}
