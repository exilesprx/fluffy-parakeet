FROM php:8.2.5-cli-bullseye

RUN apt -y update \
    && apt -y install wget git unzip

COPY --from=mlocati/php-extension-installer:2.1.27 /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions xdebug @composer

COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /opt/project