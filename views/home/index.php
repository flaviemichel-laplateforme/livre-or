<!-- page accueil de mon site de partage de photos pour partager en famille  -->

<div class="home-container">
    <section class="hero">
        <h1>Bienvenue dans votre Album Familial</h1>
        <p class="tagline">Partagez vos plus beaux moments avec ceux que vous aimez</p>
    </section>

    <?php if (is_logged_in()): ?>
        <section class="welcome-user">
            <h2>Bonjour <?= escape($_SESSION['user_login']) ?> !</h2>
            <p>Racontez votre journée, partagez vos souvenirs et laissez une trace de vos moments précieux.</p>
        </section>

        <section class="quick-actions">
            <div class="action-card">
                <span class="icon">✍️</span>
                <h3>Écrire un message</h3>
                <p>Partagez vos pensées, vos anecdotes ou décrivez vos dernières photos</p>
                <a href="<?= url('comment/create') ?>" class="btn btn-primary">Ajouter un commentaire</a>
            </div>

            <div class="action-card">
                <span class="icon">📖</span>
                <h3>Livre d'or</h3>
                <p>Découvrez tous les souvenirs et messages partagés par la famille</p>
                <a href="<?= url('comment/livre_or') ?>" class="btn btn-secondary">Voir le livre d'or</a>
            </div>

            <div class="action-card">
                <span class="icon">👤</span>
                <h3>Mon profil</h3>
                <p>Gérez vos informations personnelles et votre compte</p>
                <a href="<?= url('user/profile') ?>" class="btn btn-secondary">Voir mon profil</a>
            </div>
        </section>

        <section class="features">
            <h2>Pourquoi utiliser notre album familial ?</h2>
            <div class="feature-list">
                <div class="feature-item">
                    <span class="feature-icon">🔒</span>
                    <h4>Privé et sécurisé</h4>
                    <p>Vos souvenirs restent en famille, accessible uniquement aux membres connectés</p>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">💬</span>
                    <h4>Partagez vos histoires</h4>
                    <p>Racontez vos aventures, vos voyages et vos moments du quotidien</p>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">⏰</span>
                    <h4>Souvenirs datés</h4>
                    <p>Chaque message est horodaté pour retrouver facilement vos souvenirs</p>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">❤️</span>
                    <h4>Restez connectés</h4>
                    <p>Gardez le lien avec vos proches même à distance</p>
                </div>
            </div>
        </section>

    <?php else: ?>
        <section class="guest-welcome">
            <h2>Un espace privé pour votre famille</h2>
            <p class="intro-text">
                Créez des souvenirs inoubliables et partagez vos moments précieux avec vos proches.
                Notre livre d'or familial vous permet de garder une trace de vos meilleurs moments.
            </p>
        </section>

        <section class="benefits">
            <div class="benefit-card">
                <span class="icon">📝</span>
                <h3>Écrivez vos souvenirs</h3>
                <p>Partagez vos pensées, vos anecdotes et vos histoires de famille</p>
            </div>

            <div class="benefit-card">
                <span class="icon">🌟</span>
                <h3>Créez des souvenirs</h3>
                <p>Chaque message devient un souvenir précieux pour toute la famille</p>
            </div>

            <div class="benefit-card">
                <span class="icon">👨‍👩‍👧‍👦</span>
                <h3>Restez connectés</h3>
                <p>Rapprochez-vous de vos proches, même à distance</p>
            </div>
        </section>

        <section class="cta-section">
            <h2>Rejoignez votre famille !</h2>
            <p>Commencez à partager vos souvenirs dès aujourd'hui</p>
            <div class="cta-buttons">
                <a href="<?= url('auth/inscription') ?>" class="btn btn-primary btn-large">Créer un compte</a>
                <a href="<?= url('auth/connexion') ?>" class="btn btn-secondary btn-large">Se connecter</a>
            </div>
        </section>

        <section class="how-it-works">
            <h2>Comment ça marche ?</h2>
            <div class="steps">
                <div class="step">
                    <span class="step-number">1</span>
                    <h4>Créez votre compte</h4>
                    <p>Inscrivez-vous en quelques secondes avec un login et un mot de passe</p>
                </div>
                <div class="step">
                    <span class="step-number">2</span>
                    <h4>Connectez-vous</h4>
                    <p>Accédez à l'espace familial avec vos identifiants</p>
                </div>
                <div class="step">
                    <span class="step-number">3</span>
                    <h4>Partagez vos moments</h4>
                    <p>Écrivez vos messages et consultez ceux de votre famille</p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="footer-info">
        <p class="tagline-footer">
            <strong>Votre album familial</strong> - Partagez, souvenez-vous, connectez-vous
        </p>
    </section>
</div>