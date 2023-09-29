                          INFORMATIONS

Package fzaninotto/faker is abandoned, you should avoid using it. No replacement was suggested.
Package sensio/framework-extra-bundle is abandoned, you should avoid using it. Use Symfony instead.

sensio/framework-extra-bundle a été installé mais finalement pas été utilisé .

Si lors de l'utilisation
Entity/visites.php par un contrôleur est empechéché avec ce message d'erreur 

 Cannot autowire argument $visites of "App\Controller\admin\AdminVoyagesController::suppr()": it references class "App\Entity\Visites" but no such service exists.

 Solution testé et validé: Configurer Entity\Visites manuellement en tant que services dans le fichier services.yaml

 Ajout de "bootstrap_5_layout.html.twig"  "config/packages/twig.yaml" pour améliorer apparence des formulaires

    Installer le bundle pour uplouader des images
composer require  vich/uploader-bundle 1.19.0
Faire en cas de besoin dessintaller le bundle 
composer remove vich/uploader-bundle --update-with-dependencies --dev

    Installation d'un simulateur serveur de mail : Maildev
- installer nodejs ici version 18.18.0 LTS
- Installer maildev sur le repertoire du projet  : npm install -g maildev
- Lancer maildev : maildev
Si vous obtenez une erreur SSL, alors tapez la commande :
maildev --hide-extensions STARTTLS.
Lewebapp http://localhost:1080/ et serveur smtp http://localhost:1025/
-Configuration variable environnement de la source de données du serveur mail dans le fichien env
 MAILER_DSN=smtp://localhost:1025 

    Automatisation des tests

Tests de composants (tests unitaire) extends TestCase
Tests d'intégration extends KernelTestCase
Tests système (tests fonctionnels) extends WebTestCase

- PhpUnit est un framework de test dans une application Symfony
La commmande "php bin/phpunit" permet d'éxécuter tous les test unitaires et d'intégrations qui ont été écrits ou " php bin/phpunit --filter NomClasseTest "
- Les classes tests doit etre dans un repertoire test


DATABASE_URL="mysql://root:@127.0.0.1:3306/voyages" 







        1- ORM Doctrine

Ici sera répertorié les instructions sur console : 
Création database "voyages"
php bin/console doctrine:database:create
Création entity 

php bin/console make:entity

php bin/console make:entity

----------------------------------------------------

 Class name of the entity to create or update (e.g. BravePizza):
 > visites

 created: src/Entity/Visites.php
 created: src/Repository/VisitesRepository.php
 
 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > ville

 Field type (enter ? to see all types) [string]:
 >

 Field length [255]:
 > 50

 Can this field be null in the database (nullable) (yes/no) [no]:
 > no

 updated: src/Entity/Visites.php

 Add another property? Enter the property name (or press <return> to stop 
adding fields):
 > pays

 Field type (enter ? to see all types) [string]:
 >

 Field length [255]:
 > 50

 Can this field be null in the database (nullable) (yes/no) [no]:
 > no

 updated: src/Entity/Visites.php

 Add another property? Enter the property name (or press <return> to stop 
adding fields):
 > datecreation

 Field type (enter ? to see all types) [string]:
 > date

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Visites.php

 Add another property? Enter the property name (or press <return> to stop 
adding fields):
 > note
migration with php bin/console make:migration

-----------------------------------------------------

Fixture pour générer des data aléoatoirement , grace à au bundle doctrineFixturesBundles

- Installer l’outil  qui permettra de générer des enrengistrement 

composer require orm-fixtures --dev

- Creer une classe fixture stocké dans /src/DataFixtures

php bin/console make:fixture

Pour éxecuter la méthode Load dans la console , le code va générer des requete sql insert 
Cette action va vidé le contenu de la bdd attention

php bin/console doctrine:fixtures:load


Pour générer form à partir d'une entity
php bin/console make:form

  

Info ----------------------------------------------------
- Pour les pages twig pour afficher une date à un format donnée 
 visite.dateCreation|date('d/m/Y ')



Environnement

environnements

ManyToMany

Lier 2 entity

php bin/console make:entity

 Class name of the entity to create or update (e.g. DeliciousPizza):
 > Visites

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > environnements

 Field type (enter ? to see all types) [string]:
 > relation

 What class should this entity be related to?:
 > Environnement

What type of relationship is this?

Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
 > ManyToMany

 Do you want to add a new property to Environnement so that you can access/update Visites objects from it - e.g. $environnement->getVisites()? (yes/no) [yes]:
 > no

 updated: src/Entity/Visites.php


    Implemntation de l'authentification à l'accès à la partie admin 


1- Creer l'entity User

php bin/console make:user

 The name of the security user class (e.g. User) [User]:
 > User

 Do you want to store user data in the database (via Doctrine)? (yes/no) [yes]:
 > y

 Enter a property name that will be the unique "display" name for the 
user (e.g. email, username, uuid) [email]:
 > username

 Will this app need to hash/check user passwords? Choose No if passwords are not needed or will be checked/hashed by some other system (e.g. a single sign-on server).

 Does this app need to hash/check user passwords? (yes/no) [yes]:     
 > y

  created: src/Entity/User.php
 created: src/Repository/UserRepository.php
 updated: src/Entity/User.php
 updated: config/packages/security.yaml 


 php bin/console make:migration

 php bin/console doctrine:migrations:migrate

 Pour remplir les users dans la bdd

 Utilisation de fixture User
 php bin/console make:fixture
 'php bin/console doctrine:fixtures:load --append --group=Use' permet de charger des données de test (fixtures) dans la base de données de l'application Symfony, en ajoutant ces données au groupe spécifié ("Use") sans supprimer les données existantes.





