FROM php:8.1.11-fpm
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install zip and unzip
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    wkhtmltopdf
RUN apt-get upgrade -y
RUN apt-get install zip unzip -y

# Install xdebug
RUN apt-get install autoconf g++ make \
    && pecl install xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php8.1-mysqli php8.1-zip php8.1-bcmath php8.1-bcmath php8.1-gd php8.1-gmp php-imagick php8.1-yaml php8.1-rdkafka  php8.1-curl\
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN docker-php-ext-install mysqli