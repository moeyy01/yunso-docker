FROM php:7.4-apache
RUN apt-get update
RUN apt-get install -y libicu-dev xz-utils git python3 libgmp-dev unzip ffmpeg
RUN docker-php-ext-install intl
RUN docker-php-ext-install gmp
RUN a2enmod rewrite
RUN echo "ServerName *" >> /etc/apache2/apache2.conf
COPY . /var/www/html/
RUN chmod -R 777 -R /var/www
ENV CONVERT=1
