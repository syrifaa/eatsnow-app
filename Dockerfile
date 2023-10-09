FROM php:8.0-apache
WORKDIR /var/www/html
COPY . .
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

RUN [ ! -f /usr/local/etc/php/php.ini-production ] || sed -E -i -e 's/post_max_size = 8M/post_max_size = 10M/' /usr/local/etc/php/php.ini-production
    
RUN [ ! -f /usr/local/etc/php/php.ini-production ] || sed -E -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 10M/' /usr/local/etc/php/php.ini-production

RUN [ ! -f /usr/local/etc/php/php.ini-production ] || mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini