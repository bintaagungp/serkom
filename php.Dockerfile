FROM composer:latest as composer

FROM node:latest as node

FROM php:8.2.27-apache

RUN apt-get update
RUN apt-get install -y libonig-dev zlib1g-dev libpng-dev libcurl4-gnutls-dev libzip-dev

RUN docker-php-ext-install pdo mysqli pdo_mysql mbstring gd exif curl zip

RUN a2enmod rewrite

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /usr/local/include /usr/local/include
COPY --from=node /usr/local/share /usr/local/share

RUN npm install vite