# Tipeee - Test technique back

## Setup

Récupérez le code puis installez le projet :

```bash
# Installation
$ composer install

# Lancement du serveur
$ php -S 0.0.0.0:8000 -t public
```

L'application sera disponible à cette url : http://localhost:8000

## Contexte

L'application utilise **Symfony 4.4** ([Documentation](https://symfony.com/doc/4.4/index.html)) et comporte un Controller avec un endpoint API, une Entity (Project) et un Manager.  
L'endpoint est un simple POST permettant de créer un Project :
```
POST http://localhost:8000/projects

form[name]=''
form[slug]=''
```

## Consignes

1. Le formulaire est actuellement directement écrit dans le Controller, créez une **Form Class** pour le retirer du Controller.
2. Modifiez la serialization pour ne plus avoir à utiliser `$project->serialize()` (en utilisant par exemple le package `symfony/serializer-pack`).
