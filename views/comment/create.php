<h2>Laissez un commentaire</h2>

<form method="POST" action="<?= url('comment/create') ?>">

    <div>
        <label for="commentaire">Commentaire :</label>

        <textarea id="commentaire" name="commentaire" required></textarea>
    </div>

    <div>
        <button type="submit">Envoyer</button>
    </div>

</form>