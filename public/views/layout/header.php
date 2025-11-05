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
            <ul>
                <li><a href="<?= url() ?>">Accueil</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="<?= url('auth/logout') ?>">Déconnexion</a></li>
                    <li><a href="<?= url('user/profile') ?>">Profil</a></li>
                <?php else: ?>
                    <li><a href="<?= url('auth/login') ?>">Se connecter</a></li>
                    <li><a href="<?= url('auth/register') ?>">S'inscrire</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    
    <?php flash_messages(); ?>
    
    <main>