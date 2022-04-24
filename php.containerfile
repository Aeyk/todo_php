FROM php:7.4-apache
# install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt update && apt install -y sqlite3 libzip-dev zip
# RUN docker-php-ext-configure zip
RUN docker-php-ext-install pdo zip
RUN composer require slim/slim:"4.*"
RUN composer require slim/psr7
RUN composer update --no-scripts
RUN composer dump-autoload
RUN mkdir -p /var/www/vendor/ && mkdir -p /opt/app
RUN a2enmod rewrite
RUN a2enmod actions
COPY ./config/apache-default-site.conf /etc/apache2/sites-available/000-default.conf
# RUN chown -R www-data:www-data /var/www/html