<div>
    <h1>Inscription</h1>

    <form method="POST" action="<?= url('auth/inscription') ?>">
        <div>
            <label for="login">Nom d'utilisateur :</label>
            <input type="text" id="login" name="login" required>
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required minlength="6">
        </div>

        <div>
            <label for="password_confirm">Confirmer le mot de passe :</label>
            <input type="password" id="password_confirm" name="password_confirm" required>
        </div>

        <button type="submit" class="#">S'inscrire</button>
    </form>

    <p>Déjà un compte ? <a href="<?= url('auth/connexion') ?>">Se connecter</a></p>
</div>