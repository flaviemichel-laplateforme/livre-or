<div class="livre-or-page">
    <div class="livre-or-header">
        <img src="<?= url('assets/img/logo.png') ?>" alt="Logo FamilyNature" class="livre-or-logo">
        <h1>Livre d'Or</h1>
        <p class="livre-or-subtitle">Tous les souvenirs partagés par la famille</p>

        <?php if (is_logged_in()): ?>
            <a href="<?= url('comment/create') ?>" class="btn btn-primary btn-add-comment">
                Ajouter un nouveau commentaire
            </a>
        <?php endif; ?>
    </div>

    <div class="comments-container">
        <?php if (empty($comments)): ?>
            <div class="no-comments">
                <p>Aucun commentaire pour le moment.</p>
                <p class="subtitle">Soyez le premier à partager un souvenir !</p>
            </div>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment-card">
                    <div class="comment-header">
                        <div class="comment-author">

                            <span class="author-name"><?= escape($comment['login']) ?></span>
                        </div>
                        <div class="comment-date">
                            <span class="date-label">Posté le :</span>
                            <span><?= format_date($comment['date']) ?></span>
                            <span>Par <?= escape($comment['login']) ?></span>
                        </div>
                    </div>

                    <div class="comment-body">
                        <p><?= nl2br(escape($comment['commentaire'])) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>