# * This program is free software. It comes without any warranty, to
# * the extent permitted by applicable law. You can redistribute it
# * and/or modify it under the terms of the Do What The Fuck You Want
# * To Public License, Version 2, as published by Sam Hocevar. See
# * http://www.wtfpl.net/ for more details.

FROM php:7.3-alpine

LABEL maintainer="gloomyghost@gloomyghost.com"

RUN set -x \
  && apk add --no-cache --update \
        freetype libpng libjpeg-turbo \
        freetype-dev libpng-dev libjpeg-turbo-dev \
  && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install -j "$(getconf _NPROCESSORS_ONLN)" gd \
  && apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

WORKDIR /var/www/html

EXPOSE 80

CMD [ "php", "-S", "0000:80", "-t", "/var/www/html" ]