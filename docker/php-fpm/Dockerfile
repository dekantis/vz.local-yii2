FROM alpine:3.6

RUN apk add --no-cache php7-fpm \
    php7-bcmath \
    php7-curl \
    php7-intl \
    php7-json \
    php7-mbstring \
    php7-opcache \
    php7-mcrypt \
    php7-gd \
    php7-bz2 \
    php7-zip \
    php7-xml \
    php7-xdebug \
    php7-pdo \
    php7-pdo_mysql \
    php7-ctype \
    php7-session \
    php7-dom \
    php7-fileinfo \
    && rm -rf /var/cache/apk/*

RUN ln -s /usr/bin/php7 /usr/bin/php
COPY php.ini /etc/php7/conf.d/50-setting.ini
COPY php-fpm.conf /etc/php7/php-fpm.conf

CMD ["php-fpm7", "-F"]
