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

 Field type (enter ? to see all types) [string]:
 > integer

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Visites.php

 Add another property? Enter the property name (or press <return> to stop 
adding fields):
 > avis

 Field type (enter ? to see all types) [string]:
 > text

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Visites.php

 Add another property? Enter the property name (or press <return> to stop 
adding fields):
 >  


 
  Success! 
 

 Next: When you're ready, create a migration with php bin/console make:migration

-----------------------------------------------------

Fixture pour générer des data aléoatoirement , grace à au bundle doctrineFixturesBundles

Installer l’outil  qui permettra de générer des enrengistrement 

composer require orm-fixtures --dev

Creer une classe fixture stocké dans /src/DataFixtures

php bin/console make:fixture

Pour éxecuter la méthode Load dans la console , le code va générer des requete sql insert 
Cette action va vidé le contenu de la bdd attention

php bin/console doctrine:fixtures:load

