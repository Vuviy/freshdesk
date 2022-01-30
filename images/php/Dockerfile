FROM php:7.4-fpm

WORKDIR /var/www/html

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = 192.168.65.2" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

CMD php-fpm
