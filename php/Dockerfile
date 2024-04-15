FROM php:8.1-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

# allow super user - set this if you use Composer as a super user at all times like in docker containers
ENV COMPOSER_ALLOW_SUPERUSER=1

# obtain composer using multi-stage build
# https://docs.docker.com/build/building/multi-stage/
COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer