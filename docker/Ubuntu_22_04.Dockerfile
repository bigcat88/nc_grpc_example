FROM nextcloud:stable-apache as base

RUN \
  apt-get -qq update && \
  DEBIAN_FRONTEND=noninteractive apt-get -y -q install \
    zlib1g-dev \
    wget \
    curl \
    python3-dev \
    python3-pip

# Building gRPC from source

RUN \
  curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer && \
  yes '' | pecl install -f grpc && \
  yes '' | pecl install -f protobuf

# Enabling extensions

RUN \
  docker-php-ext-enable protobuf.so && \
  docker-php-ext-enable grpc.so

FROM base as proof_of_concept

RUN \
    pip install -U pip && \
    pip install grpcio protobuf

#COPY . /
#
## Run gRPC server and client
#
#RUN \
#   python3 emul_server.py & python3 client.py
