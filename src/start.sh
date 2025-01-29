#!/bin/bash

# Commande Docker Compose à utiliser
DOCKER_COMPOSE_CMD='docker-compose'

# Stoppe et supprime les conteneurs en cours d'exécution
echo "Arrêt des conteneurs en cours..."
$DOCKER_COMPOSE_CMD down

# Vérifie et supprime les conteneurs s'ils existent
echo "Suppression des conteneurs existants (si nécessaire)..."

for container in php7.4_1 php7.4_2 phpmyadmin nginx-proxy mysql8; do
    if [ $(docker ps -a -q -f name=$container) ]; then
        echo "Suppression du conteneur $container..."
        docker rm -f $container
    else
        echo "Le conteneur $container n'existe pas."
    fi
done

# Reconstruit et relance les conteneurs
echo "Lancement des conteneurs..."
$DOCKER_COMPOSE_CMD up --build -d

# Vérifie si la commande docker-compose a réussi
if [ $? -eq 0 ]; then
    echo "Les conteneurs ont démarré avec succès."
    
    # Ouvre la page dans le navigateur par défaut
    echo "Ouverture de l'application dans votre navigateur..."
    if which xdg-open > /dev/null; then
        xdg-open http://localhost:8080/php
    elif which open > /dev/null; then
        open http://localhost:8080/php
    else
        echo "Veuillez ouvrir manuellement http://localhost:8080/php dans votre navigateur."
    fi
else
    echo "Une erreur s'est produite lors du démarrage des conteneurs."
    exit 1
fi
