
# Portfolio Symfony avec EasyAdmin

Bienvenue dans le projet **Portfolio Symfony** utilisant EasyAdmin pour gérer le contenu des pages. Ce projet a pour but de créer un portfolio flexible, facile à personnaliser, avec une interface d'administration moderne.

## Fonctionnalités

- Gestion facile des pages avec EasyAdmin.
- Création de projets, services, et autres types de contenu.
- Frontend personnalisable avec le moteur de template Twig.
- Backend puissant et sécurisé avec Symfony.

## Prérequis

Avant de commencer, assurez-vous d'avoir les outils suivants installés :

- PHP >= 8.1
- [Composer](https://getcomposer.org/)
- MySQL ou un autre système de gestion de bases de données compatible avec Doctrine

## Installation

Suivez ces étapes pour installer et lancer le projet localement :

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/votre-repo.git
   cd votre-repo
   ```

2. Installez les dépendances via Composer :
   ```bash
   composer install
   ```

3. Créez un fichier `.env.local` pour configurer la connexion à la base de données :
   ```bash
   cp .env .env.local
   ```

   Modifiez la ligne suivante dans `.env.local` en fonction de vos identifiants MySQL :
   ```
   DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/nom_de_la_base_de_donnees"
   ```

4. Créez la base de données et exécutez les migrations :
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. Lancez le serveur Symfony :
   ```bash
   symfony serve
   ```

6. Accédez à votre projet dans le navigateur :
   ```
   http://127.0.0.1:8000
   ```

## Accès à l'interface d'administration

1. Créez un compte administrateur en exécutant la commande suivante :
   ```bash
   php bin/console make:user
   ```

   Suivez les instructions pour créer un utilisateur avec le rôle `ROLE_ADMIN`.

2. Accédez à l'interface d'administration en vous connectant à l'adresse suivante :
   ```
   http://127.0.0.1:8000/admin
   ```

## Contribution

Les contributions sont les bienvenues ! Voici comment vous pouvez contribuer :

1. **Fork** le projet.
2. Créez une **branche de fonctionnalité** (`git checkout -b ma-nouvelle-fonctionnalite`).
3. **Committez** vos modifications (`git commit -m 'Ajout de nouvelle fonctionnalité'`).
4. **Poussez** vers la branche (`git push origin ma-nouvelle-fonctionnalite`).
5. Ouvrez une **Pull Request**.

## Problèmes et Demandes

Si vous rencontrez des problèmes ou avez des suggestions, veuillez ouvrir un [issue](https://github.com/votre-utilisateur/votre-repo/issues).

## Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
```
