# Php-fpm-alpine x Nginx
### Symfony | Docker

Avec MariaDB & MailDev

Pour lancer le projet :
````shell
docker-compose up -d
Déplacer le composer.json (n'importe quel dossier juste il faut le garder) 
puis lancer un composer require symfony/runtime puis coller le contenant du composer.json dans le nouveau.
Puis faire un composer i

````Pour crée la db et les tables 
symphony console d:d:c puis symphony console d:m:m

````Pour lancer les datafixture
symphony console d:f:l --no-interaction

Pensez ensuite à aller exécuter toutes vos commandes depuis l'intérieur du container.

Par exemple :
````shell
cd symfony_project
composer require orm
````
(Demandez à Composer de NE PAS créer une config Docker pour la database)

Enfin, modifiez la config DB dans le fichier .env de Symfony :
````shell
DATABASE_URL=mysql://root:ChangeMeLater@db:3306/symfony_db?serverVersion=mariadb-10.7.1
````
