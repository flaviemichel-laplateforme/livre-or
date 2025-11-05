<?php
// Fonctions utilitaires

/**
 * Sécurise l'affichage d'une chaîne de caractères (protection XSS)
 */
function escape($string)
{
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Affiche une chaîne sécurisée (échappée)
 */
function e($string)
{
    echo escape($string);
}

/**
 * Retourne une chaîne sécurisée sans l'afficher
 */
function esc($string)
{
    return escape($string);
}

/**
 * Génère une URL absolue
 */
function url($path = '')
{
    $base_url = rtrim(BASE_URL, '/');
    $path = ltrim($path, '/');

    if (empty($path)) {
        return $base_url . '/';
    }

    return $base_url . '/' . $path;
}

/**
 * Redirection HTTP
 */
function redirect($path = '')
{
    $url = url($path);
    header("Location: $url");
    exit;
}

/**
 * Génère un token CSRF
 */
function csrf_token()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Vérifie un token CSRF
 */
function verify_csrf_token($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Définit un message flash
 */
function set_flash($type, $message)
{
    $_SESSION['flash_messages'][$type][] = $message;
}

/**
 * Récupère et supprime les messages flash
 */
function get_flash_messages($type = null)
{
    if (!isset($_SESSION['flash_messages'])) {
        return [];
    }

    if ($type) {
        $messages = $_SESSION['flash_messages'][$type] ?? [];
        unset($_SESSION['flash_messages'][$type]);
        return $messages;
    }

    $messages = $_SESSION['flash_messages'];
    unset($_SESSION['flash_messages']);
    return $messages;
}

/**
 * Vérifie s'il y a des messages flash
 */
function has_flash_messages($type = null)
{
    if (!isset($_SESSION['flash_messages'])) {
        return false;
    }

    if ($type) {
        return !empty($_SESSION['flash_messages'][$type]);
    }

    return !empty($_SESSION['flash_messages']);
}

/**
 * Nettoie une chaîne de caractères
 */
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Valide une adresse email
 */
function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Génère un mot de passe sécurisé
 */
function generate_password($length = 12)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

/**
 * Hache un mot de passe
 */
function hash_password($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

/**
 * Vérifie un mot de passe
 */
function verify_password($password, $hash)
{
    return password_verify($password, $hash);
}

/**
 * Formate une date
 */
function format_date($date, $format = 'd/m/Y H:i')
{
    return date($format, strtotime($date));
}

/**
 * Vérifie si une requête est en POST
 */
function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Vérifie si une requête est en GET
 */
function is_get()
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

/**
 * Retourne la valeur d'un paramètre POST
 */
function post($key, $default = null)
{
    return $_POST[$key] ?? $default;
}

/**
 * Retourne la valeur d'un paramètre GET
 */
function get($key, $default = null)
{
    return $_GET[$key] ?? $default;
}

/**
 * Vérifie si un utilisateur est connecté
 */
function is_logged_in()
{
    return isset($_SESSION['user_id']);
}

/**
 * Retourne l'ID de l'utilisateur connecté
 */
function current_user_id()
{
    return $_SESSION['user_id'] ?? null;
}

function current_user_role()
{
    return $_SESSION['user_role'] ?? null;
}

function is_admin()
{
    return is_logged_in() && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function get_user_status()
{
    if (!is_logged_in()) {
        return 'guest';
    }

    return is_admin() ? 'admin' : 'user';
}


function get_user_status_badge()
{
    $status = get_user_status();

    $badges = [
        'guest' => 'Non connecté',
        'user' => 'Utilisateur',
        'admin' => 'Administrateur'
    ];

    return $badges[$status] ?? $badges['guest'];
}


function current_user_name()
{
    if (!is_logged_in()) {
        return null;
    }

    return ($_SESSION['user_first_name'] ?? '') . ' ' . ($_SESSION['user_last_name'] ?? '');
}


function require_login()
{
    if (!is_logged_in()) {
        // Déconnexion automatique si tentative d'accès non autorisé
        session_unset();
        session_destroy();
        session_start();
        set_flash('error', 'Vous avez été déconnecté suite à une tentative d\'accès non autorisé.');
        redirect('auth/login');
    }
}



function require_admin()
{
    require_login();

    if (!is_admin()) {
        // Déconnexion automatique si tentative d'accès non autorisé
        session_unset();
        session_destroy();
        session_start();
        set_flash('error', 'Vous avez été déconnecté suite à une tentative d\'accès non autorisé à une page administrateur.');
        redirect('auth/login');
    }
}



/**
 * Déconnecte l'utilisateur
 */
function logout()
{
    session_destroy();
    redirect('auth/login');
}

/**
 * Formate un nombre
 */
function format_number($number, $decimals = 2)
{
    return number_format($number, $decimals, ',', ' ');
}

/**
 * Génère un slug à partir d'une chaîne
 */
function generate_slug($string)
{
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    $string = preg_replace('/[\s-]+/', '-', $string);
    return trim($string, '-');
}

/**
 * Gère l'upload d'une image de couverture
 */
function handle_media_upload($file, $media_type)
{
    // Formats acceptés : JPG, PNG, GIF uniquement
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Taille maximale : 2 Mo
    $max_size = 2 * 1024 * 1024; // 2 Mo en octets

    // Dimensions maximales : largeur 300px, hauteur 400px
    $max_width = 300;
    $max_height = 400;

    // Déterminer le dossier de destination
    if ($media_type === 'book') {
        $upload_dir = PUBLIC_PATH . '/uploads/covers/books/';
        $relative_path_prefix = 'books/';
    } elseif ($media_type === 'movie') {
        $upload_dir = PUBLIC_PATH . '/uploads/covers/movies/';
        $relative_path_prefix = 'movies/';
    } elseif ($media_type === 'video_game' || $media_type === 'game') {
        $upload_dir = PUBLIC_PATH . '/uploads/covers/video_games/';
        $relative_path_prefix = 'video_games/';
    } else {
        return [
            'success' => false,
            'error' => 'Type de média invalide'
        ];
    }

    // Créer le dossier s'il n'existe pas
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Vérifier si le fichier a été uploadé sans erreur
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $error_messages = [
            UPLOAD_ERR_INI_SIZE => 'Le fichier est trop volumineux (max 2 Mo)',
            UPLOAD_ERR_FORM_SIZE => 'Le fichier est trop volumineux (max 2 Mo)',
            UPLOAD_ERR_PARTIAL => 'L\'upload a été interrompu',
            UPLOAD_ERR_NO_FILE => 'Aucun fichier n\'a été uploadé',
            UPLOAD_ERR_NO_TMP_DIR => 'Dossier temporaire manquant',
            UPLOAD_ERR_CANT_WRITE => 'Impossible d\'écrire le fichier',
            UPLOAD_ERR_EXTENSION => 'Extension interdite'
        ];

        return [
            'success' => false,
            'error' => $error_messages[$file['error']] ?? 'Erreur d\'upload inconnue'
        ];
    }

    // Vérifier la taille du fichier (maximum 2 Mo)
    if ($file['size'] > $max_size) {
        return [
            'success' => false,
            'error' => 'Le fichier est trop volumineux (maximum 2 Mo)'
        ];
    }

    // Vérifier le type MIME
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime_type, $allowed_types)) {
        return [
            'success' => false,
            'error' => 'Format non autorisé. Formats acceptés : JPG, PNG, GIF uniquement'
        ];
    }

    // Vérifier l'extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($extension, $allowed_extensions)) {
        return [
            'success' => false,
            'error' => 'Extension non autorisée. Extensions acceptées : jpg, jpeg, png, gif'
        ];
    }

    // Générer un nom de fichier unique et sécurisé
    $filename_without_ext = pathinfo($file['name'], PATHINFO_FILENAME);
    $safe_filename = preg_replace("/[^a-zA-Z0-9_-]/", "_", $filename_without_ext);
    $unique_filename = $safe_filename . '_' . time() . '.' . $extension;

    // Charger l'image source
    switch ($mime_type) {
        case 'image/jpeg':
            $source_image = imagecreatefromjpeg($file['tmp_name']);
            break;
        case 'image/png':
            $source_image = imagecreatefrompng($file['tmp_name']);
            break;
        case 'image/gif':
            $source_image = imagecreatefromgif($file['tmp_name']);
            break;
        default:
            return [
                'success' => false,
                'error' => 'Type d\'image non supporté'
            ];
    }

    if (!$source_image) {
        return [
            'success' => false,
            'error' => 'Impossible de lire l\'image'
        ];
    }

    // Obtenir les dimensions originales
    $original_width = imagesx($source_image);
    $original_height = imagesy($source_image);

    // Calculer les nouvelles dimensions en conservant le ratio
    // Redimensionnement automatique : largeur max 300px, hauteur max 400px
    $ratio = min($max_width / $original_width, $max_height / $original_height);

    // Si l'image est déjà plus petite, ne pas l'agrandir
    if ($ratio >= 1) {
        $new_width = $original_width;
        $new_height = $original_height;
    } else {
        $new_width = (int) ($original_width * $ratio);
        $new_height = (int) ($original_height * $ratio);
    }

    // Créer la nouvelle image redimensionnée
    $resized_image = imagecreatetruecolor($new_width, $new_height);

    // Préserver la transparence pour PNG et GIF
    if ($mime_type === 'image/png' || $mime_type === 'image/gif') {
        imagealphablending($resized_image, false);
        imagesavealpha($resized_image, true);
        $transparent = imagecolorallocatealpha($resized_image, 255, 255, 255, 127);
        imagefilledrectangle($resized_image, 0, 0, $new_width, $new_height, $transparent);
    }

    // Redimensionner l'image
    imagecopyresampled(
        $resized_image,
        $source_image,
        0,
        0,
        0,
        0,
        $new_width,
        $new_height,
        $original_width,
        $original_height
    );

    // Chemin de destination
    $upload_path = $upload_dir . $unique_filename;

    // Sauvegarder l'image redimensionnée
    $save_success = false;
    switch ($mime_type) {
        case 'image/jpeg':
            $save_success = imagejpeg($resized_image, $upload_path, 90);
            break;
        case 'image/png':
            $save_success = imagepng($resized_image, $upload_path, 9);
            break;
        case 'image/gif':
            $save_success = imagegif($resized_image, $upload_path);
            break;
    }

    // Libérer la mémoire
    imagedestroy($source_image);
    imagedestroy($resized_image);

    if (!$save_success) {
        return [
            'success' => false,
            'error' => 'Erreur lors de la sauvegarde de l\'image'
        ];
    }

    // Retourner le chemin relatif pour affichage
    return [
        'success' => true,
        'path' => $unique_filename
    ];
}
/* Traduit le statut d'un média en français */
function translate_media_status($status)
{
    $translations = [
        'available' => 'Disponible',
        'reserved' => 'Réservé',
        'borrowed' => 'Emprunté'
    ];

    return $translations[$status] ?? $status;
}


/**
 * Détermine si un lien de navigation doit être marqué actif côté serveur.
 * Retourne true si $target correspond exactement ou est un préfixe du path courant.
 * Exemple : nav_active('/admin') retournera true pour '/admin' et '/admin/add'.
 */
function nav_active($target)
{
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    $path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
    $path = rtrim($path, '/') ?: '/';

    $t = '/' . ltrim((string) $target, '/');
    $t = rtrim($t, '/') ?: '/';

    if ($path === $t) {
        return true;
    }

    if ($t !== '/' && strpos($path, $t) === 0) {
        return true;
    }

    return false;
}

/**
 * Traduit le statut d'un emprunt en français
 */
function translate_borrowing_status($status)
{
    $translations = [
        'borrowed' => 'En cours',
        'returned' => 'Retourné',
        'overdue' => 'En retard'
    ];

    return $translations[$status] ?? $status;
}

/**
 * Traduit le statut d'une réservation en français
 */
function translate_reservation_status($status)
{
    $translations = [
        'pending' => 'En attente',
        'approved' => 'Approuvé',
        'cancelled' => 'Annulé',
        'rejected' => 'Refusé'
    ];

    return $translations[$status] ?? $status;
}

/**
 * Traduit un texte de l'anglais vers le français
 * Utilise l'API gratuite MyMemory Translation
 * 
 * @param string $text Texte à traduire
 * @param string $source_lang Langue source (par défaut 'en')
 * @param string $target_lang Langue cible (par défaut 'fr')
 * @return string Texte traduit ou texte original en cas d'erreur
 */
function translate_text($text, $source_lang = 'en', $target_lang = 'fr')
{
    // Si le texte est vide, retourner tel quel
    if (empty($text)) {
        return $text;
    }

    // Limiter la taille du texte (MyMemory a une limite de 500 caractères par requête)
    $max_length = 500;
    $chunks = [];

    if (strlen($text) > $max_length) {
        // Découper le texte en paragraphes
        $paragraphs = explode("\n", $text);
        $current_chunk = '';

        foreach ($paragraphs as $paragraph) {
            if (strlen($current_chunk . $paragraph) > $max_length) {
                if (!empty($current_chunk)) {
                    $chunks[] = trim($current_chunk);
                    $current_chunk = $paragraph . "\n";
                } else {
                    // Paragraphe trop long, le découper par phrases
                    $chunks[] = substr($paragraph, 0, $max_length);
                }
            } else {
                $current_chunk .= $paragraph . "\n";
            }
        }

        if (!empty($current_chunk)) {
            $chunks[] = trim($current_chunk);
        }
    } else {
        $chunks[] = $text;
    }

    // Traduire chaque chunk
    $translated_chunks = [];

    foreach ($chunks as $chunk) {
        $encoded_text = urlencode($chunk);
        $url = "https://api.mymemory.translated.net/get?q={$encoded_text}&langpair={$source_lang}|{$target_lang}";

        // Utiliser cURL pour faire la requête
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code === 200 && $response) {
            $data = json_decode($response, true);

            if (isset($data['responseData']['translatedText'])) {
                $translated_chunks[] = $data['responseData']['translatedText'];
            } else {
                // En cas d'erreur, garder le texte original
                $translated_chunks[] = $chunk;
            }
        } else {
            // En cas d'erreur de connexion, garder le texte original
            $translated_chunks[] = $chunk;
        }

        // Pause courte pour éviter de surcharger l'API
        usleep(200000); // 0.2 secondes
    }

    return implode("\n\n", $translated_chunks);
}

/**
 * Détecte si un texte est principalement en anglais
 * 
 * @param string $text Texte à analyser
 * @return bool True si le texte semble être en anglais
 */
function is_text_english($text)
{
    if (empty($text)) {
        return false;
    }

    // Mots anglais courants qui n'existent pas en français
    $english_words = [
        // Articles et prépositions
        'the',
        'and',
        'with',
        'from',
        'into',
        'onto',
        'upon',
        // Pronoms
        'this',
        'that',
        'these',
        'those',
        'his',
        'her',
        'him',
        'she',
        'they',
        'their',
        'you',
        'your',
        // Verbes auxiliaires
        'have',
        'has',
        'had',
        'was',
        'were',
        'been',
        'being',
        'are',
        'is',
        // Conjonctions et adverbes
        'when',
        'where',
        'which',
        'while',
        'who',
        'what',
        'why',
        'how',
        // Verbes courants
        'will',
        'would',
        'should',
        'could',
        'can',
        'must',
        'may',
        // Mots de gaming
        'play',
        'game',
        'player',
        'world',
        'level',
        'adventure',
        'battle',
        'fight'
    ];

    $text_lower = strtolower($text);
    $word_count = str_word_count($text_lower);
    $matches = 0;

    foreach ($english_words as $word) {
        // Recherche de mots entiers uniquement
        if (preg_match('/\b' . preg_quote($word, '/') . '\b/', $text_lower)) {
            $matches++;
        }
    }

    // Calcul du ratio : si plus de 10% des mots sont anglais OU au moins 2 mots pour les textes courts
    if ($word_count < 20) {
        // Pour les textes courts (moins de 20 mots), seuil de 2 mots
        return $matches >= 2;
    } else {
        // Pour les textes longs, au moins 3 mots ou 10% de mots anglais
        return $matches >= 3 || ($matches / $word_count) >= 0.1;
    }
}

/**
 * Traduit automatiquement le texte s'il est détecté comme étant en anglais
 * 
 * @param string $text Texte à traduire si nécessaire
 * @return string Texte traduit ou original
 */
function auto_translate_if_english($text)
{
    if (empty($text)) {
        return $text;
    }

    // Vérifier si le texte est en anglais
    if (is_text_english($text)) {
        return translate_text($text);
    }

    return $text;
}

/**
 * Affiche une vue complète avec header et footer
 * 
 * @param string $view Chemin de la vue (ex: 'home/home', 'auth/login')
 * @param array $data Données à passer à la vue
 */
function render($view, $data = [])
{
    // Extraire les données pour les rendre disponibles dans les vues
    if (!empty($data)) {
        extract($data);
    }

    // Charger le header
    require VIEW_PATH . '/layout/header.php';

    // Charger la vue principale
    require VIEW_PATH . '/' . $view . '.php';

    // Charger le footer
    require VIEW_PATH . '/layout/footer.php';
}

/**
 * Affiche une vue partielle sans header/footer
 * 
 * @param string $view Chemin de la vue
 * @param array $data Données à passer à la vue
 */
function render_partial($view, $data = [])
{
    if (!empty($data)) {
        extract($data);
    }

    require VIEW_PATH . '/' . $view . '.php';
}
