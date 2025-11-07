<div class="auth-container">
    <div class="auth-image">
        <img src="<?= url('assets/img/fondinscription.jpg') ?>" alt="Image de fond FamilyNature">
    </div>

    <div class="auth-form">
        <div class="form-header">
            <img src="<?= url('assets/img/logo.png') ?>" alt="Logo FamilyNature" class="form-logo">
            <h1>Créer un compte</h1>
            <p class="form-subtitle">Rejoignez votre famille sur FamilyNature</p>
        </div>

        <form method="POST" action="<?= url('auth/inscription') ?>">
            <div class="form-group">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" id="login" name="login" required placeholder="Votre nom d'utilisateur">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required minlength="6" placeholder="Minimum 6 caractères">
            </div>

            <div class="form-group">
                <label for="password_confirm">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirmez votre mot de passe">
            </div>

            <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
        </form>

        <p class="form-footer">Déjà un compte ? <a href="<?= url('auth/connexion') ?>">Se connecter</a></p>
    </div>
</div>