FROM php:7.4-apache

# Mise à jour du système
RUN apt-get update && apt-get upgrade -y

# Retirer cette ligne car les extensions sont déjà incluses :
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Téléchargement d'un script permettant d'attendre qu'un service soit prêt
RUN curl -o wait-for-it.sh https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh
RUN chmod +x wait-for-it.sh

EXPOSE 80
