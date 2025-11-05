<div class="container">
    <h1>Connexion</h1>

    <form method="POST" action="<?= url('auth/connexion') ?>">
        <div class="form-group">
            <label for="login">Nom d'utilisateur :</label>
            <input type="text" id="login" name="login" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="<?= url('auth/inscription') ?>">S'inscrire</a></p>
</div>