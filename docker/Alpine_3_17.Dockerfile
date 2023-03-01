FROM alpine:3.17 as base

RUN \
  apk add --no-cache \
    autoconf \
    zlib-dev \
    php81-dev \
    php81-pear \
    php81-phar \
    php81-iconv \
    php81-openssl \
    gcc \
    g++ \
    linux-headers \
    make

# Building GRPC from source

RUN \
  curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer && \
  pecl install grpc && \
  pecl install protobuf

# Adding extensions to php.ini

RUN \
  sed -i "2i extension=protobuf.so" /etc/php/8.1/cli/php.ini && \
  sed -i "2i extension=grpc.so" /etc/php/8.1/cli/php.ini

FROM base as base_nc

RUN \
   echo "to do"
