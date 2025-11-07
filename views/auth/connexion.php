<div class="auth-container">
    <!-- Image à gauche -->
    <div class="auth-image">
        <img src="<?= url('assets/img/connexionfond7.jpg') ?>" alt="Image de connexion">
    </div>

    <!-- Formulaire à droite -->
    <div class="auth-form">
        <div class="form-header">
            <img src="<?= url('assets/img/logo.png') ?>" alt="Logo FamilyNature" class="form-logo">
            <h1>Connexion</h1>
            <p class="form-subtitle">Retrouvez vos souvenirs de famille</p>
        </div>

        <form method="POST" action="<?= url('auth/connexion') ?>">
            <div class="form-group">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" id="login" name="login" placeholder="Votre nom d'utilisateur" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form>

        <div class="form-footer">
            <p>Pas encore de compte ? <a href="<?= url('auth/inscription') ?>">S'inscrire</a></p>
        </div>
    </div>
</div>