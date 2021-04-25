FROM php:8.0-fpm-buster

WORKDIR /var/www/html

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions \
 && sync \
 && install-php-extensions mysqli \
 && install-php-extensions pdo_mysql \
 && install-php-extensions opcache \
 && install-php-extensions bcmath \
 && install-php-extensions amqp \
 && install-php-extensions zip \
 && install-php-extensions redis \
 && install-php-extensions apcu

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/* \
 && curl --insecure https://getcomposer.org/composer-stable.phar -o /usr/bin/composer \
 && chmod +x /usr/bin/composer

EXPOSE 9000
