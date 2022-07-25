FROM php:7.4-fpm

COPY php.ini /usr/local/etc/php/php.ini

RUN docker-php-ext-install \
        pdo_mysql \
    && docker-php-ext-enable \
        pdo_mysql
