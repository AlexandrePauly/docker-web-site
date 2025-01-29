# Projet Cloud Computing for Analytics : Infrastructure de Développement et de Production

## Description

Ce projet met en place une infrastructure complète pour le développement, le test et la production d'une application web en PHP/MySQL avec un équilibrage de charge via NGINX. Application web développée en 1ère année et l'objectif est de la conteneurisée.

L'objectif est de permettre le développement en local tout en préparant un environnement de production livrable. Les conteneurs sont configurés pour exécuter et tester du code développé sur la machine hôte.

## Architecture

Le projet utilise plusieurs services conteneurisés via Docker Compose :

- NGINX : Reverse proxy et équilibrage de charge entre plusieurs instances PHP.
- PHP (x2) : Instances PHP avec Apache pour exécuter le code de l'application.
- MySQL : Base de données relationnelle pour stocker les données de l'application.
- PhpMyAdmin : Interface graphique pour gérer la base de données MySQL.

## Prérequis

Docker et Docker-compose installés sur votre machine.

    - Installer Docker
    - Installer Docker Compose

## Installation

### Étapes pour installer l'infrastructure :

1. Cloner ce dépôt : ```git clone https://github.com/AlexandrePauly/docker-web-site```

2. Naviguer dans le répertoire du projet: ```cd docker-web-site/src```

3. Modifier la commande Docker Compose en fonction de la version installée :

```bash
DOCKER_COMPOSE_CMD='docker-compose' # Commande par défaut
DOCKER_COMPOSE_CMD='docker compose' # Commande utilisée sur des versions plus récentes
```

4. Démarrer l'infrastructure : 

```bash
chmod +x start.sh
./start.sh
```

**Remarque** : Le script start.sh arrête les conteneurs existants, reconstruit l'infrastructure, et lance l'application automatiquement. Une fois lancé, l'application s'ouvre automatiquement dans votre navigateur.

## Tests et accès aux services

Accéder aux services :

1. URL principale : [http://localhost:8080/php](http://localhost:8080/php)
2. Accès direct aux instances PHP : 
    - Instance 1 : Par défaut, l'application redirige sur la 1ère instance [http://localhost:8080/php/?instance=1](http://localhost:8080/php/?instance=1)
    - Instance 2 : Mais il est possible de se déplacer sur la seconde via [http://localhost:8080/php/?instance=2](http://localhost:8080/php/?instance=2). 
3. PhpMyAdmin : Accès à la base de données MySQL via l'interface graphique  [http://localhost:8899/](http://localhost:8899/).

## Stress tests :

Des tests de charge ont été réalisés pour évaluer la robustesse de l'infrastructure sous forte sollicitation.

### Apache Benchmark (ab) : 

1. Configuration : ```ab -n 1000 -c 100 http://localhost:8080/php```

2. Logs : Les résultats sont disponibles dans le dossier /logs/ab/.

**Remarque** : Penser à installer Apache Benchmark au préalable pour effectuer les tests : ```pip install ab-api```

### Locust :

Locust permet de créer des scénarios de test plus avancés et interactifs.

1. Lancer Locust après le démarrage des conteneurs : ```locust -f logs/locust/locustfile.py``` 

2. Accéder à l'interface Locust : [http://localhost:8089/](http://localhost:8089/)

3. Définir les paramètres de test : 

    - Host : http://localhost:8080/php
    - Nombre d'utilisateurs (Users) et Taux de spawn

**Remarque** : Penser à installer Locust au préalable pour effectuer les tests : ```pip install locust```

## Difficultés rencontrées :

1. Modifications PHP nécessaires : Des pratiques tolérées en PHP local (comme les espaces avant <?php>) provoquent des erreurs dans un environnement conteneurisé avec NGINX. Cela a nécessité de :
    - Supprimer les espaces ou caractères avant <?php
    - Corriger des redirections avec header() pour éviter les erreurs *Cannot modify header information*.
2. Gestion des ports : Le choix et la configuration des ports pour chaque service (PHP, NGINX, MySQL, PhpMyAdmin) ont demandé une attention particulière pour éviter des conflits et garantir une bonne isolation des services.

## Variables d'environnement :

Les mots de passe et configurations sensibles sont définis dans le fichier .env.

## Auteur

**Cy Tech - Berdoyes Florent, Clémenceau Maxime, Honor Julien, Pauly Alexandre et Sabadie Laura**

Projet réalisé dans le cadre du cours sur Cloud Computing for Analytics.

## Licence

Ce projet est sous licence libre. Vous êtes libre de l'utiliser et de le modifier selon vos besoins.
