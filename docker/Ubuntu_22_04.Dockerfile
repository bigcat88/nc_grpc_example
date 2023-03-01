FROM ubuntu:22.04 as base

RUN \
  apt-get -qq update && \
  apt-get -y -q install \
    autoconf \
    zlib1g-dev \
    php-dev \
    php-pear

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
