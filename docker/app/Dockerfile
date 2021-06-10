FROM php:8.0.2-fpm-alpine

# Install recommended extensions for Symfony + pgsql
RUN apk add --no-cache \
        icu-dev \
        postgresql-dev \
    && docker-php-ext-install \
        intl \
        opcache \
        pdo pdo_pgsql pgsql \
    && docker-php-ext-enable \
        intl \
        opcache

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer | php -- \
      --install-dir=/usr/local/bin \
      --filename=composer

# Run script
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/app
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
