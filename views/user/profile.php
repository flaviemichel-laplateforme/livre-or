<form method="POST" action="<?= url('user/update_profile') ?>">

    <div>
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" value="<?php echo escape($user['login']); ?>" required>
    </div>

    <div>
        <label for="old_password">Ancien mot de passe :</label>
        <input type="password" id="old_password" name="old_password">
    </div>

    <div>
        <label for="new_password">Nouveau mot de passe :</label>
        <input type="password" id="new_password" name="new_password">
    </div>

    <button type="submit" class="btn btn-primary">Valider les modifications</button>
</form>