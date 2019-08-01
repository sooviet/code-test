FROM php:7.3-apache-stretch

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html/
COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html/  && a2enmod rewrite

EXPOSE 80

CMD php /usr/local/bin/composer install ; /usr/sbin/apache2ctl -D FOREGROUND