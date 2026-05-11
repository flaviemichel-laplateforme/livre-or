# Livre d'Or

Application PHP MVC permettant la création et la gestion d'un livre d'or en ligne.

## 📋 Description

**Livre d'Or** est une application web basée sur l'architecture **MVC (Model-View-Controller)** qui permet aux utilisateurs de :

- S'inscrire et se connecter
- Consulter les commentaires du livre d'or
- Ajouter leurs propres commentaires
- Gérer leur profil utilisateur

## 🏗️ Architecture

L'application suit une structure MVC classique avec séparation des préoccupations :

```
livre-or/
├── config/              # Configuration de l'application
│   └── database.php    # Connexion à la base de données
├── controllers/         # Contrôleurs (logique métier)
│   ├── auth_controller.php
│   ├── comment_controller.php
│   ├── home_controller.php
│   └── user_controller.php
├── core/               # Fichiers core du framework
│   ├── database.php    # Classe de gestion de la BD
│   ├── router.php      # Système de routage
│   └── view.php        # Gestion des vues
├── models/             # Modèles (accès aux données)
│   ├── comment_model.php
│   └── user_model.php
├── views/              # Vues (templates HTML)
│   ├── auth/           # Pages d'authentification
│   ├── comment/        # Pages de commentaires
│   ├── errors/         # Pages d'erreur
│   ├── home/           # Page d'accueil
│   ├── layout/         # Layouts principaux
│   └── user/           # Pages utilisateur
├── includes/           # Fichiers utilitaires
│   └── helpers.php
├── public/             # Racine web (point d'entrée)
│   ├── index.php
│   └── assets/
│       ├── style.css
│       └── img/
├── livreor.sql         # Structure de la base de données
└── README.md           # Ce fichier
```

## 🚀 Installation

### Prérequis

- PHP 8.1 ou supérieur
- MySQL 8.0 ou supérieur
- Serveur web (Apache, Nginx, etc.)
- Laragon ou équivalent

### Étapes d'installation

1. **Cloner ou télécharger le projet**

   ```bash
   cd c:\laragon\www
   git clone <repository-url> livre-or
   ```

2. **Créer la base de données**
   - Importer le fichier `livreor.sql` dans MySQL

   ```bash
   mysql -u root < livreor.sql
   ```

3. **Configurer la base de données** (si nécessaire)
   - Éditer [config/database.php](config/database.php)
   - Adapter les identifiants DB_USER et DB_PASS si nécessaire

4. **Accéder à l'application**
   ```
   http://localhost/livre-or/public
   ```

## 🗄️ Base de données

### Tables

#### `utilisateurs`

| Colonne  | Type         | Description                   |
| -------- | ------------ | ----------------------------- |
| id       | INT          | Clé primaire auto-incrémentée |
| login    | VARCHAR(255) | Nom d'utilisateur unique      |
| password | VARCHAR(255) | Mot de passe hashé            |

#### `commentaires`

| Colonne        | Type     | Description                               |
| -------------- | -------- | ----------------------------------------- |
| id             | INT      | Clé primaire auto-incrémentée             |
| commentaire    | TEXT     | Contenu du commentaire                    |
| id_utilisateur | INT      | Référence à l'utilisateur (clé étrangère) |
| date           | DATETIME | Date et heure du commentaire              |

## 🔀 Routage

L'application utilise un système de routage URL-based :

```
URL : http://localhost/livre-or/public/?url=controller/action/param1/param2
```

### Routes principales

- `/` - Accueil
- `/auth/connexion` - Page de connexion
- `/auth/inscription` - Page d'inscription
- `/auth/deconnexion` - Déconnexion
- `/comment/livre_or` - Affichage du livre d'or
- `/comment/create` - Créer un commentaire
- `/user/profile` - Profil utilisateur

## 🔐 Authentification

- Système de session PHP natif
- Mots de passe hashés (à implémenter avec `password_hash()`)
- Vérification de session à chaque accès

## 📝 Fichiers clés

- **[public/index.php](public/index.php)** - Point d'entrée principal
- **[core/router.php](core/router.php)** - Système de routage et dispatching
- **[config/database.php](config/database.php)** - Configuration et variables globales
- **[controllers/home_controller.php](controllers/home_controller.php)** - Contrôleur principal

## 🛠️ Utilisation

### Créer un contrôleur

1. Créer un fichier `nomcontroleur_controller.php` dans `/controllers`
2. Implémenter les actions (méthodes)
3. Accéder via `/?url=nomcontroleur/action`

### Créer une vue

1. Créer un fichier `.php` dans `/views` avec la structure appropriée
2. Utiliser la fonction `render()` depuis le contrôleur

### Utiliser les modèles

1. Créer une classe dans `/models`
2. Implémenter les méthodes d'accès aux données
3. Instancier et utiliser dans le contrôleur

## 📦 Dépendances

- Aucune dépendance externe requise (framework maison)

## 📄 Licence

Non spécifiée

## ✅ Statut

Version 1.0.0 - En développement

---

**Dernière mise à jour :** Mai 2026
