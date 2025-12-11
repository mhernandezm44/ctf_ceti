FROM php:8.2-apache
COPY . /var/www/html/
COPY apache.conf /etc/apache2/sites-enabled/000-default.conf
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80

