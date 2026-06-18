FROM php:8.2-cli

WORKDIR /app

# dependencies voor composer
COPY composer.json composer.lock ./

RUN apt-get update && apt-get install -y unzip git curl \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer install --no-interaction --prefer-dist

# rest van project
COPY . .

CMD ["php", "src/index.php"]