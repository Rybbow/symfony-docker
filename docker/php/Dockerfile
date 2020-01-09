FROM php:7.4-fpm-alpine

WORKDIR /srv/app

RUN apk add --no-cache --virtual .persistent-deps \
		git \
		icu-libs \
		zlib

RUN apk update \
    && apk upgrade \
    && apk add --no-cache autoconf g++ libtool make \
    && docker-php-ext-install pdo_mysql \
    && apk del --no-cache autoconf g++ libtool make \
    && rm -rf /tmp/* /var/cache/apk/*

COPY docker/php/php.ini /usr/local/etc/php/php.ini
RUN sed -i "s|user = www-data|user = nobody|g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s|group = www-data|group = nobody|g" /usr/local/etc/php-fpm.d/www.conf

COPY docker/php/install-composer.sh /usr/local/bin/docker-app-install-composer
RUN chmod +x /usr/local/bin/docker-app-install-composer

RUN set -xe \
	&& docker-app-install-composer \
	&& mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

# Use prestissimo to speed up builds
RUN composer global require "hirak/prestissimo:^0.3" --prefer-dist --no-progress --no-suggest --optimize-autoloader --classmap-authoritative  --no-interaction

COPY docker/php/docker-entrypoint.sh /usr/local/bin/docker-app-entrypoint
RUN chmod +x /usr/local/bin/docker-app-entrypoint

# Allow to use development versions of Symfony
ARG STABILITY=stable
ENV STABILITY ${STABILITY}
ENV PATH="./vendor/bin:./bin:${PATH}"

COPY . .

RUN mkdir -p var/cache var/logs \
    && php -v \
    && composer install --prefer-dist --no-progress --no-suggest --classmap-authoritative --no-interaction --no-scripts \
	&& composer clear-cache

ENTRYPOINT ["docker-app-entrypoint"]
CMD ["php-fpm"]
