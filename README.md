# Projet Cloud Computing for Analytics : Infrastructure de Développement et de Production

## Description

Ce projet met en place une infrastructure complète pour le développement, le test et la production d'une application web basée sur PHP et MySQL, avec un équilibrage de charge via NGINX.

L'objectif est de permettre le développement en local tout en préparant un environnement de production livrable. Les conteneurs sont configurés pour exécuter et tester du code développé sur la machine hôte.

## Architecture

Le projet utilise plusieurs services conteneurisés via Docker Compose :

- NGINX : Reverse proxy et équilibrage de charge entre plusieurs instances PHP.
- PHP (x2) : Instances PHP avec Apache pour exécuter le code de l'application.
- MySQL : Base de données relationnelle pour stocker les données de l'application.
- PhpMyAdmin : Interface graphique pour gérer la base de données MySQL.

## Prérequis

1. Docker et Docker-compose installés sur votre machine.
    - Installer Docker
    - Installer Docker Compose
2. Cloner ce dépôt :

```bash
git clone https://github.com/AlexandrePauly/docker-web-site
cd docker-web-site
```

## Installation

### Étapes pour démarrer l'infrastructure :

1. Construire et lancer les conteneurs :

```bash
docker-compose up --build
```

2. Accéder aux services :
    - Application Web : [http://localhost:81](http://localhost:81)
    - PhpMyAdmin : [http://localhost:8899](http://localhost:8899)

### Variables d'environnement :

Les mots de passe et configurations sensibles sont définis dans le fichier docker-compose.yml. Pour une production sécurisée, utilisez un fichier .env.

## Auteur

**Cy Tech - Berdoyes Florent, Clémenceau Maxime, Honor Julien, Pauly Alexandre et Sabadie Laura**

Projet réalisé dans le cadre du cours sur Cloud Computing for Analytics.

## Licence

Ce projet est sous licence libre. Vous êtes libre de l'utiliser et de le modifier selon vos besoins.
