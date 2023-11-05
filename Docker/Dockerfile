FROM php:8.2-apache
RUN docker-php-ext-install mysqli

# Habilita modulos de apache
RUN a2enmod rewrite headers
# Copia los archivos de configuracion de apache y PHP
COPY web/conf/apache2.conf /etc/apache2/apache2.conf
COPY web/conf/php.ini /usr/local/etc/php/php.ini
