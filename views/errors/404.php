<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page non trouvée</title>
    <link rel="stylesheet" href="<?= url('assets/style.css') ?>">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .error-container {
            max-width: 600px;
            padding: 2rem;
        }

        h1 {
            font-size: 6rem;
            margin: 0;
            color: #e74c3c;
        }

        h2 {
            color: #333;
        }

        a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background: #2980b9;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>404</h1>
        <h2>Page non trouvée</h2>
        <p>Désolé, la page que vous recherchez n'existe pas ou a été déplacée.</p>
        <a href="<?= url('') ?>">Retour à l'accueil</a>
    </div>
</body>

</html>