<h2>Livre d'or</h2>

<?php if (is_logged_in()): ?>
    <a href="<?= url('comment/create') ?>">Ajouter un nouveau commentaire</a>
<?php endif; ?>


<?php foreach ($comments as $comment): ?>

    <div class="commentaire-item">

        <p><?= escape($comment['commentaire']) ?></p>

        <p class="comment-meta">
            Posté le <?= format_date($comment['date']) ?>
            par <?= escape($comment['login']) ?>
        </p>

    </div>
    <hr>

<?php endforeach; ?>