<?php
// Contrôleur de la page d'accueil

/**
 * Affiche la page d'accueil
 * URL: /
 */
function home_index()
{
    $data = [
        'title' => 'Accueil - Livre d\'Or',
        'message' => 'Bienvenue sur notre livre d\'or'
    ];


    render('home/index', $data);
}
