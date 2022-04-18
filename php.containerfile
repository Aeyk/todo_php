FROM php:7.4-apache
# install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt update && apt install -y sqlite3 libzip-dev zip
# RUN docker-php-ext-configure zip
RUN docker-php-ext-install pdo zip
# COPY ./ /var/www/html/
# VOLUME ./ /var/www/html/
