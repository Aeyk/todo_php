FROM docker.io/library/mariadb:latest
ADD --chown=mysql:mysql --chmod=400 ./config/.my.cnf /etc/mysql/conf.d/creds.cnf
COPY ./db/seed.sql /seed.sqlE
ENTRYPOINT ["docker-entrypoint.sh"]
CMD mysql --defaults-extra-file=/etc/mysql/conf.d/creds.cnf  todo_php 
