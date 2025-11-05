<div class="container">
    <h1><?= escape($title ?? 'Bienvenue') ?></h1>
    
    <?php if (isset($message)): ?>
        <p><?= escape($message) ?></p>
    <?php endif; ?>
    
    <section class="intro">
        <p>Partagez vos messages et commentaires sur notre livre d'or !</p>
    </section>
    
    <?php if (is_logged_in()): ?>
        <div class="actions">
            <a href="<?= url('comment/create') ?>" class="btn btn-primary">Ajouter un commentaire</a>
            <a href="<?= url('comment/list') ?>" class="btn btn-secondary">Voir le livre d'or</a>
        </div>
    <?php else: ?>
        <div class="actions">
            <p>Veuillez vous <a href="<?= url('auth/login') ?>">connecter</a> ou <a href="<?= url('auth/register') ?>">créer un compte</a> pour participer.</p>
        </div>
    <?php endif; ?>
</div>
