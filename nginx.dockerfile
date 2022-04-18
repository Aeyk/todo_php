FROM debian:stable-slim
RUN apt-get update
RUN apt-get install -y nginx php-fpm php-mysql
# For debugging purposes
RUN apt-get -y install curl
RUN mkdir -p /var/www/
# COPY ./config/php-fpm.conf /etc/php/7.4/fpm/php-fpm.conf
COPY ./config/nginx.conf /etc/nginx/nginx.conf
COPY ./config/www.conf /etc/nginx/sites-available/default
COPY ./src/* /var/www/html/
RUN mkdir -p /run/php/
RUN nginx -t
COPY --chmod=0755 ./entrypoint.sh /etc/entrypoint
ENTRYPOINT "/etc/entrypoint"
