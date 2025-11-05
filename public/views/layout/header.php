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
                <?php else: ?>
                    <li><a href="<?= url('auth/connexion') ?>">Se connecter</a></li>
                    <li><a href="<?= url('auth/inscription') ?>">S'inscrire</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <?php flash_messages(); ?>

    <main>