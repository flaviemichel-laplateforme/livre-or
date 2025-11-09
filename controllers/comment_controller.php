<?php

/**
 * Affiche la page du livre d'or
 * URL: /comment/livre_or
 */
function comment_livre_or()
{
    // 1. Récupérer tous les commentaires du Modèle
    $comments = get_all_comments_with_details();

    // 2. Envoyer ces données à la Vue pour affichage
    render('comment/livre_or', [
        'comments' => $comments
    ]);
}




/**
 * Affiche le formulaire de création de commentaire (en GET)
 * et traite la soumission du formulaire (en POST).
 * URL: /comment/create
 */
function comment_create()
{

    require_login();


    if (is_post()) {


        // On récupère le texte du commentaire
        $commentaire_text = post('commentaire');


        if (empty($commentaire_text)) {

            set_flash('error', 'Veuillez remplir le champ commentaire.');
            redirect('comment/create');
        } else {


            // 1. On récupère l'ID de l'auteur (qui est connecté)
            $user_id = $_SESSION['user_id'];

            // 2. On appelle le Modèle pour insérer en BDD
            if (create_comment($commentaire_text, $user_id)) {


                set_flash('success', 'Votre commentaire a été ajouté avec succès !');


                redirect('comment/livre_or');
            } else {


                set_flash('error', 'Une erreur est survenue lors de l\'ajout du commentaire.');
                redirect('comment/create');
            }
        }
    } else {


        render('comment/create');
    }
}
