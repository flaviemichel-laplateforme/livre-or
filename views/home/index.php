<!-- page accueil de mon site de partage de photos pour partager en famille  -->

<div class="home-container">
    <section class="hero">
        <h1>Bienvenue <?php if (is_logged_in()): ?><?= escape($_SESSION['user_login']) ?><?php endif; ?> dans votre Album Familial</h1>
        <p class="tagline">Partagez vos plus beaux moments avec ceux que vous aimez</p>
    </section>

    <!-- Carrousel d'images -->
    <section class="carousel-section">
        <div class="carousel-container">
            <div class="carousel-slide active">
                <img src="<?= url('assets/img/caroussel.jpg') ?>" alt="Photo famille 1">
            </div>
            <div class="carousel-slide">
                <img src="<?= url('assets/img/caroussel2.jpg') ?>" alt="Photo famille 2">
            </div>
            <div class="carousel-slide">
                <img src="<?= url('assets/img/caroussel3.jpg') ?>" alt="Photo famille 3">
            </div>
            <div class="carousel-slide">
                <img src="<?= url('assets/img/caroussel4.jpg') ?>" alt="Photo famille 4">
            </div>
            <div class="carousel-slide">
                <img src="<?= url('assets/img/caroussel5.jpg') ?>" alt="Photo famille 5">
            </div>
            <div class="carousel-slide">
                <img src="<?= url('assets/img/caroussel6.jpg') ?>" alt="Photo famille 6">
            </div>

            <!-- Boutons de navigation -->
            <button class="carousel-btn prev" onclick="changeSlide(-1)">❮</button>
            <button class="carousel-btn next" onclick="changeSlide(1)">❯</button>

            <!-- Indicateurs -->
            <div class="carousel-indicators">
                <span class="indicator active" onclick="goToSlide(0)"></span>
                <span class="indicator" onclick="goToSlide(1)"></span>
                <span class="indicator" onclick="goToSlide(2)"></span>
                <span class="indicator" onclick="goToSlide(3)"></span>
                <span class="indicator" onclick="goToSlide(4)"></span>
                <span class="indicator" onclick="goToSlide(5)"></span>
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
                <span class="icon">📖</span>
                <h3>Livre d'or</h3>
                <p>Découvrez tous les souvenirs et messages partagés par la famille</p>
                <a href="<?= url('comment/livre_or') ?>" class="btn btn-primary">Voir le livre d'or</a>
            </div>

            <div class="action-card">
                <span class="icon">👤</span>
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
</div>

<script>
    // Carrousel automatique
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.indicator');
    const totalSlides = slides.length;

    // Fonction pour afficher une slide spécifique
    function showSlide(n) {
        // Retour au début ou à la fin si nécessaire
        if (n >= totalSlides) {
            currentSlide = 0;
        } else if (n < 0) {
            currentSlide = totalSlides - 1;
        } else {
            currentSlide = n;
        }

        // Masquer toutes les slides
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));

        // Afficher la slide actuelle
        slides[currentSlide].classList.add('active');
        indicators[currentSlide].classList.add('active');
    }

    // Fonction pour changer de slide (boutons précédent/suivant)
    function changeSlide(direction) {
        showSlide(currentSlide + direction);
    }

    // Fonction pour aller directement à une slide (indicateurs)
    function goToSlide(n) {
        showSlide(n);
    }

    // Défilement automatique toutes les 5 secondes
    setInterval(() => {
        changeSlide(1);
    }, 5000);
</script>