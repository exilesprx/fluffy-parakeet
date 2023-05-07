FROM php:8.2.5-cli-bullseye

RUN apt -y update \
    && apt -y install wget git unzip

RUN pecl install xdebug

RUN wget https://getcomposer.org/installer \
    && chmod +x installer

RUN php ./installer \
    && mv composer.phar /usr/local/bin/composer

COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /opt/project