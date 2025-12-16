FROM php:8.2-apache
COPY . /var/www/html/
COPY apache.conf /etc/apache2/sites-enabled/000-default.conf
RUN chmod -R 755 /var/www/html
