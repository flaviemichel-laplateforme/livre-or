<div class="create-comment-page">
    <div class="create-comment-container">
        <div class="create-header">
            <img src="<?= url('assets/img/logo.png') ?>" alt="Logo FamilyNature" class="create-logo">
            <h1>Laissez un commentaire</h1>
            <p class="create-subtitle">Partagez vos souvenirs avec votre famille</p>
        </div>

        <form method="POST" action="<?= url('comment/create') ?>" class="create-form">
            <div class="form-group">
                <label for="commentaire">Votre commentaire</label>
                <textarea id="commentaire" name="commentaire" rows="8" placeholder="Écrivez votre message ici..." required></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-block">Publier le commentaire</button>
                <a href="<?= url('comment/livre_or') ?>" class="btn btn-secondary btn-block">Retour au livre d'or</a>
            </div>
        </form>
    </div>
</div>