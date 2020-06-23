FROM funcionalhealth/php-service:7.1

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN mkdir -p /var/www/html/vendor && \
    composer install 