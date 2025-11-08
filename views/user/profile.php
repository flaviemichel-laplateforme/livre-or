<div class="profile-page">
    <div class="profile-container">
        <div class="profile-header">
            <img src="<?= url('assets/img/logo.png') ?>" alt="Logo FamilyNature" class="profile-logo">
            <h1>Mon Profil</h1>
            <p class="profile-subtitle">Gérez vos informations personnelles</p>
        </div>

        <form method="POST" action="<?= url('user/update_profile') ?>" class="profile-form">
            <div class="form-group">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" id="login" name="login" value="<?php echo escape($user['login']); ?>" placeholder="Votre nom d'utilisateur" required>
            </div>

            <div class="form-group">
                <label for="old_password">Ancien mot de passe</label>
                <input type="password" id="old_password" name="old_password" placeholder="Laissez vide pour ne pas changer">
            </div>

            <div class="form-group">
                <label for="new_password">Nouveau mot de passe</label>
                <input type="password" id="new_password" name="new_password" placeholder="Nouveau mot de passe (optionnel)">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Enregistrer les modifications</button>
        </form>
    </div>
</div>