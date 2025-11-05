<!-- point d’entrée (router ou simple include du home_controller) -->
<?php

session_start();

// Charger la configuration
require_once 'config/database.php';


// Charger les contrôleurs

require_once 'controllers/auth_controller.php';
require_once 'controllers/comment_controller.php';
require_once 'controllers/home_controller.php';
require_once 'controllers/user_controller.php';




// Charger les modèles

require_once 'models/comment.php';
require_once 'models/user.php';
?>