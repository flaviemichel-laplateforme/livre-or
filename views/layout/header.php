<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon livre d\'or' ?></title>
    <link rel="stylesheet" href="<?= url('assets/style.css') ?>">
</head>

<body>
    <header>
        <nav>
            <ul class='menu-header'>
                <li><a href="<?= url('home/index') ?>">Accueil</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="<?= url('auth/deconnexion') ?>">Déconnexion</a></li>
                    <li><a href="<?= url('user/profile') ?>">Profil</a></li>
                    <li><a href="<?= url('comment/livre_or') ?>">Livre d'or</a></li>
                <?php else: ?>
                    <li><a href="<?= url('auth/connexion') ?>">Se connecter</a></li>
                    <li><a href="<?= url('auth/inscription') ?>">S'inscrire</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <?php if (has_flash_messages()): ?>
        <div class="flash-messages">
            <?php
            // 1. On récupère TOUS les types de messages
            $all_message_types = get_flash_messages();

            // 2. On boucle sur chaque TYPE (ex: 'error', 'success')
            foreach ($all_message_types as $type => $messages_list):

                // 3. On boucle sur chaque MESSAGE de ce type
                foreach ($messages_list as $message):
            ?>
                    <p class="flash-message <?= escape($type) ?>">
                        <?= escape($message) ?>
                    </p>

            <?php
                endforeach; // Fin de la boucle des messages
            endforeach; // Fin de la boucle des types
            ?>
        </div>
    <?php endif; ?>

    <main>