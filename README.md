--------------------------
VERIFICATION avant tous:
git --version
php -v
php -m | grep -Ei 'ctype|iconv|pcre|session|simplexml|tokenizer|mbstring|xml|intl|curl|zip'
composer --version
symfony -V
php -m | grep -Ei 'pdo|pgsql' /ou/ php -m | grep -Ei 'sqlite|pdo' ceci pour sqlite
composer diagnose

note:
“Symfony utilise surtout OpenAPI/Swagger via NelmioApiDocBundle.” alors que django utilise swagger
Tu peux afficher ta vraie arborescence actuelle sur ta machine avec :
tree -L 2
note ici avec linux
***************************************
1) Créer le projet
symfony new crud3
cd crud3

2) Installer les packages utiles
composer require symfony/orm-pack => rp: n car ici on va pas utiliser docker
composer require --dev symfony/maker-bundle
composer require symfony/form symfony/validator symfony/twig-bundle
composer require symfony/security-csrf

3) Mettre le .env
APP_ENV=dev
APP_SECRET=dev_secret_symfony_crud3_2026
APP_SHARE_DIR=var/share
DEFAULT_URI=http://localhost
DATABASE_URL="sqlite:///%kernel.project_dir%/var/app.db"

4) Installer SQLite PHP si besoin
sudo apt update
sudo apt install php8.3-sqlite3
Vérifier : php -m | grep -Ei 'sqlite|pdo'

5) Créer le fichier SQLite
touch var/app.db
ls var

CRUD complet pour Produit2
6) Créer l’entité
php bin/console make:entity Produit2
Réponses à mettre :
Class name of the entity to create or update:
> Produit2

New property name (press <return> to stop adding fields):
> nom

Field type:
> string

Field length:
> 255

Can this field be null in the database (nullable):
> no

New property name:
> prix

Field type:
> float

Can this field be null in the database (nullable):
> no

New property name:
> description

Field type:
> text

Can this field be null in the database (nullable):
> yes

New property name:
>

7) Créer la migration
php bin/console make:migration

8) Exécuter la migration
php bin/console doctrine:migrations:migrate
Quand Symfony demande :
WARNING! You are about to execute a migration in database "main" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
>yes

9) Générer le CRUD
php bin/console make:crud Produit2
Quand Symfony demande :
Choose a name for your controller class (e.g. Produit2Controller) [Produit2Controller]:
>Produit2Controller
Do you want to generate PHPUnit tests? [Experimental] (yes/no) [no]:
>no

10) Lancer le projet
symfony server:start
Ouvrir : http://127.0.0.1:8000/produit2/

------------------------------




