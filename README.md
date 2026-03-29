# Projet Web SGBD de films

Une application web de gestion et de consultation de films, développée avec le framework PHP Symfony.

## Fonctionnalités principales

- **Gestion des films** : Catalogue complet avec recherche, filtrage par genre et année.
- **Espace utilisateur** : Inscription, connexion, gestion du profil et des favoris.
- **Système de location** : Simulation de panier et de paiement pour la location de films.
- **Administration** : Interface complète pour la gestion des films, acteurs, réalisateurs, genres, pays et prix.

## Pré-requis

Avant de commencer, assure-toi d'avoir installé :
- **PHP 8.2** (ou supérieur)
- **Composer**
- **Node.js & npm** (ou Yarn)
- **MySQL** ou **MariaDB**
- **Symfony CLI** (optionnel mais recommandé)

## Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/CloisonNasale/projet-web-films.git
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

## Configuration de la base de données

1. **Configurer les variables d'environnement**
   Ouvre le fichier `.env` et modifie la ligne `DATABASE_URL` avec tes identifiants :
   ```text
   DATABASE_URL="mysql://[USER]:[PASSWORD]@127.0.0.1:3306/projet_web_film?serverVersion=8.0"
   ```

2. **Créer la base de données**
   ```bash
   php bin/console doctrine:database:create
   ```

3. **Génèrer un fichier de migration Doctrine**
    ```bash
    php bin/console make:migration
    ```

4. **Exécuter les migrations**
   ```bash
   php bin/console doctrine:migrations:migrate
   ```
5. **Importe le fichier film-bdd.sql présent à la racine pour remplir la base de données.**

## Lancement de l'application

Démarre le serveur local Symfony :
```bash
symfony serve
```
Ou via PHP :
```bash
php -S localhost:8000 -t public
```

L'application sera accessible sur [http://localhost:8000](http://localhost:8000).

## Accès Administration

Pour accéder à la console de gestion des données (`/gestion-donnees`), tu dois être connecté avec un compte utilisateur ou en créer un.

---
Développé dans le cadre des études.
