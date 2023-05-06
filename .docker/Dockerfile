FROM php:8.1.18-cli-bullseye

RUN apt -y update \
    && apt -y install wget git unzip

RUN wget https://getcomposer.org/installer \
    && chmod +x installer

RUN php ./installer \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /opt/project