# Projet : Création d'une API RESTful en PHP

## Vue d'ensemble

Le projet consiste à créer une API RESTful en PHP pour permettre à notre entreprise de partager des données avec d'autres sociétés. Ce projet est un défi d'apprentissage, avec une durée d'une semaine, et peut être réalisé en groupe ou individuellement.

### Objectifs d'apprentissage

- **Créer une API RESTful** : Maîtriser les principes de base pour concevoir une API qui respecte les conventions REST.
- **Modèle MVC (sans la Vue)** : Appliquer le modèle de conception MVC (Modèle-Vue-Contrôleur) en se concentrant sur les aspects Modèle et Contrôleur.
- **Opérations CRUD** : Implémenter les opérations CRUD (Créer, Lire, Mettre à jour, Supprimer) sur une base de données.
- **Base de données MySQL avec PDO** : Utiliser PDO pour interagir de manière sécurisée avec une base de données MySQL.
- **Validation des données** : Utiliser la fonction `filter_var` pour valider les données d'entrée.

## Mission

[Github Mission](https://github.com/becodeorg/CRL-KELLER-7/tree/main/1.TRAIL/3.The-Mountain/Backend/PHP/6.API)

La mission est de développer une API en PHP avec les points de terminaison suivants :

| Méthode | Point de terminaison | Description          |
|---------|----------------------|----------------------|
| GET     | /posts               | Obtenir tous les posts |
| GET     | /post/:id            | Obtenir un post par id |
| POST    | /post                | Créer un nouveau post  |
| PUT     | /post/:id            | Mettre à jour un post par id |
| DELETE  | /post/:id            | Supprimer un post par id |

L'API doit retourner les données au format JSON et être accessible via une URL telle que `http://localhost:8000/api/posts`.

## Langages et technologies utilisés

- **PHP** : Langage principal pour le développement de l'API.
- **MySQL** : Base de données utilisée pour stocker les posts.
- **PDO (PHP Data Objects)** : Extension PHP pour accéder à la base de données MySQL.
- **Composer** : Gestionnaire de dépendances pour PHP.
- **Postman** : Outil de test d'API.

### Structure du projet

Le projet sera structuré en différents dossiers pour une meilleure organisation :

- `config` : Contiendra les fichiers de configuration du projet.
- `controllers` : Contiendra les contrôleurs pour gérer les requêtes HTTP.
- `models` : Contiendra les modèles représentant les données et interagissant avec la base de données.
- `routes` : Contiendra les définitions de routes de l'API.
- `utils` : Contiendra des fonctions utilitaires.
- `vendor` : Contiendra les dépendances du projet, gérées via Composer.

### Base de données

Nous allons créer une base de données nommée `api` et une table `posts` avec les champs suivants :

- `id`: int(11) auto_increment
- `title`: varchar(255)
- `body`: text
- `author`: varchar(255)
- `created_at`: datetime
- `updated_at`: datetime

### Format des données

Les données retournées par l'API doivent être au format JSON, par exemple :

```json
{
    "status": 200,
    "message": "OK",
    "data": [
        {
            "id": 1,
            "title": "Lorem ipsum dolor sit amet",
            "body": "Lorem ipsum dolor sit amet,...",
            "author": "John Doe",
            "created_at": "2021-06-06 12:00:00",
            "updated_at": "2021-06-06 12:00:00"
        }
    ]
}
