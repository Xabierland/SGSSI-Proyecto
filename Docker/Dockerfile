FROM php:8.2-apache

# Instala las dependencias necesarias
RUN docker-php-ext-install mysqli

# Crear certificados
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/apache-selfsigned.key -out /etc/ssl/certs/apache-selfsigned.crt -subj "/C=ES/ST=BASK COUNTRY/L=BILBAO/O=UPV"
RUN chown -R www-data:www-data /etc/ssl/private/apache-selfsigned.key /etc/ssl/certs/apache-selfsigned.crt

# Copia los archivos de configuracion de apache y PHP
COPY web/conf/apache2.conf /etc/apache2/apache2.conf
COPY web/conf/localhost.conf /etc/apache2/sites-available/localhost.conf
COPY web/conf/php.ini /usr/local/etc/php/php.ini

# Habilita modulos de apache
RUN a2enmod rewrite headers ssl
RUN a2ensite localhost.conf

RUN ls -l /etc/ssl/private/apache-selfsigned.key /etc/ssl/certs/apache-selfsigned.crt