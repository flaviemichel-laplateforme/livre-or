<!-- page accueil de mon site de partage de photos pour partager en famille  -->

<div class="home-container">
    <section class="hero">
        <h1>Bienvenue <?php if (is_logged_in()): ?><?= escape($_SESSION['user_login']) ?><?php endif; ?> dans votre Album Familial</h1>
        <p class="tagline">Partagez vos plus beaux moments avec ceux que vous aimez</p>
    </section>

    <!-- Carrousel d'images CSS pur -->
    <section class="carousel-section">
        <div class="carousel-container-css">
            <input type="radio" name="carousel" id="slide1" checked>
            <input type="radio" name="carousel" id="slide2">
            <input type="radio" name="carousel" id="slide3">
            <input type="radio" name="carousel" id="slide4">
            <input type="radio" name="carousel" id="slide5">
            <input type="radio" name="carousel" id="slide6">

            <div class="carousel-slides">
                <div class="carousel-slide-css">
                    <img src="<?= url('assets/img/caroussel.jpg') ?>" alt="Photo famille 1">
                </div>
                <div class="carousel-slide-css">
                    <img src="<?= url('assets/img/caroussel2.jpg') ?>" alt="Photo famille 2">
                </div>
                <div class="carousel-slide-css">
                    <img src="<?= url('assets/img/caroussel3.jpg') ?>" alt="Photo famille 3">
                </div>
                <div class="carousel-slide-css">
                    <img src="<?= url('assets/img/caroussel4.jpg') ?>" alt="Photo famille 4">
                </div>
                <div class="carousel-slide-css">
                    <img src="<?= url('assets/img/caroussel5.jpg') ?>" alt="Photo famille 5">
                </div>
                <div class="carousel-slide-css">
                    <img src="<?= url('assets/img/caroussel6.jpg') ?>" alt="Photo famille 6">
                </div>
            </div>

            <!-- Navigation par labels -->
            <div class="carousel-navigation">
                <label for="slide1" class="carousel-indicator"></label>
                <label for="slide2" class="carousel-indicator"></label>
                <label for="slide3" class="carousel-indicator"></label>
                <label for="slide4" class="carousel-indicator"></label>
                <label for="slide5" class="carousel-indicator"></label>
                <label for="slide6" class="carousel-indicator"></label>
            </div>
        </div>
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
                <span class="icon">📜</span>
                <h3>Livre d'or</h3>
                <p>Découvrez tous les souvenirs et messages partagés par la famille</p>
                <a href="<?= url('comment/livre_or') ?>" class="btn btn-primary">Voir le livre d'or</a>
            </div>

            <div class="action-card">
                <span class="icon">👨</span>
                <h3>Mon profil</h3>
                <p>Gérez vos informations personnelles et votre compte</p>
                <a href="<?= url('user/profile') ?>" class="btn btn-primary">Voir mon profil</a>
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

        <!-- Aperçu des commentaires récents -->
        <?php if (!empty($recent_comments)): ?>
            <section class="preview-comments">
                <h2>Derniers messages partagés</h2>
                <p class="preview-subtitle">Découvrez quelques messages de notre communauté</p>

                <div class="preview-cards">
                    <?php foreach ($recent_comments as $comment): ?>
                        <div class="preview-card">
                            <div class="preview-blur">
                                <p class="preview-text"><?= escape(substr($comment['commentaire'], 0, 100)) ?>...</p>
                                <div class="preview-meta">
                                    <span class="preview-author">Par <?= escape($comment['login']) ?></span>
                                    <span class="preview-date">Le <?= date('d/m/Y', strtotime($comment['date'])) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="preview-cta">
                    <p class="preview-message">✨ Connectez-vous pour voir tous les messages et partager les vôtres !</p>
                    <div class="preview-buttons">
                        <a href="<?= url('auth/connexion') ?>" class="btn btn-primary">Se connecter</a>
                        <a href="<?= url('auth/inscription') ?>" class="btn btn-secondary">Créer un compte</a>
                    </div>
                </div>
            </section>
        <?php endif; ?>

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
</div>