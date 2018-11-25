## Installation

Installation des dépendances :

```
$ composer install
```

Création de la base de donnée  :

```
$ php bin/console doctrine:database:create
```

Exécution des migrations  :

```
$ php bin/console doctrine:migrations:migrate
```

Exécution des fixtures  :

```
$ php bin/console doctrine:fixtures:load  
```
