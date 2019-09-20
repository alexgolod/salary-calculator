FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
        zip \
        git \
    && docker-php-ext-install \
        pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/project/

CMD bash -c "composer install \
 && php bin/console doctrine:database:create --if-not-exists \
 && php bin/console doctrine:migrations:migrate \
 && php bin/console doctrine:fixtures:load \
 && php-fpm"
