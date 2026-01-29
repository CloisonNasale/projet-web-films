# Projet Web Films - Symfony

Une application web moderne de gestion et de consultation de films, développée avec le framework Symfony.

## 🚀 Fonctionnalités principales

- **Gestion des Films** : Catalogue complet avec recherche, filtrage par genre et année.
- **Espace Utilisateur** : Inscription, connexion, gestion du profil et des favoris.
- **Système de Location** : Simulation de panier et de paiement pour la location de films.
- **Administration** : Interface complète pour la gestion des films, acteurs, réalisateurs, genres, pays et prix (CRUD).
- **Design Moderne** : Interface responsive et épurée utilisant Bootstrap et des styles personnalisés.

## 🛠️ Pré-requis

Avant de commencer, assurez-vous d'avoir installé :
- **PHP 8.2** ou supérieur
- **Composer**
- **Node.js & npm** (ou Yarn)
- **MySQL** ou **MariaDB**
- **Symfony CLI** (optionnel mais recommandé)

## 📥 Installation

1. **Cloner le projet**
   ```bash
   git clone [URL_DU_DEPOT]
   cd Projet_Web_Films
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

4. **Compiler les assets**
   ```bash
   npm run dev
   # ou pour la production : npm run build
   ```

## 🗄️ Configuration de la base de données

1. **Configurer les variables d'environnement**
   Ouvrez le fichier `.env` et modifiez la ligne `DATABASE_URL` avec vos identifiants :
   ```text
   DATABASE_URL="mysql://[IDENTIFIANT]:[MOTDEPASSE]@127.0.0.1:3306/projet_web_film?serverVersion=8.0"
   ```

2. **Créer la base de données**
   ```bash
   php bin/console doctrine:database:create
   ```

3. **Génére un fichier de migration Doctrine**
    ```bash
    php bin/console make:migration
    ```

4. **Exécuter les migrations**
   ```bash
   php bin/console doctrine:migrations:migrate
   ```
5. **Il ne vous reste maintenant plus qu'à importer le fichier film-bdd.sql du répertoire pour ajouter les données dans la BDD**

## 🏁 Lancement de l'application

Démarrez le serveur local Symfony :
```bash
symfony serve
```
Ou via PHP :
```bash
php -S localhost:8000 -t public
```

L'application sera accessible sur [http://localhost:8000](http://localhost:8000).

## 👤 Accès Administration

Pour accéder à la console de gestion des données (`/gestion-donnees`), vous devez être connecté avec un compte utilisateur.

---
Développé dans le cadre du projet web.
