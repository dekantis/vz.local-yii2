FROM alpine:3.15.4

RUN apk add --no-cache php7 \
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
    php7-phar \
    php7-tokenizer \
    php7-zlib \
    php7-dom \
    php7-fileinfo \
    && rm -rf /var/cache/apk/*

COPY php.ini /etc/php7/conf.d/50-setting.ini

#Install composer

RUN apk add --no-cache git curl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer


RUN export PATH=$PATH:/root/.composer/vendor/bin \
    && export COMPOSER_DISABLE_XDEBUG_WARN=1

ARG GITHUB_OAUTH_TOKEN=false
RUN if [ ${GITHUB_OAUTH_TOKEN} != false ]; then \
    composer config -g github-oauth.github.com ${GITHUB_OAUTH_TOKEN} \
;fi

RUN composer self-update --1
RUN composer global require "fxp/composer-asset-plugin:^1.3.1"

RUN apk add --no-cache nodejs npm

RUN npm install -g less less-plugin-clean-css raml2html

CMD ["php", "-a"]
