FROM php:7.4-apache

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get -y --no-install-recommends install libzip-dev zlib1g-dev git zip unzip mc wget && apt-get clean &&  rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chmod ugo+x /usr/local/bin/composer

# Install xdebug
# RUN pecl install xdebug-2.5.0
# RUN docker-php-ext-enable xdebug

# Enable Postgres in PHP
# RUN docker-php-ext-install pdo_pgsql pgsql

# Enable Other extensions php - These and another extensions can be 
# installed and activated after the container is running, using the 
# command "docker exec -it lamp docker-php-ext-install extensionname"

# RUN apt-get -y install libmcrypt-dev
# RUN docker-php-ext-install mcrypt

# RUN docker-php-ext-install tokenizer
# RUN docker-php-ext-install json
# RUN docker-php-ext-install soap

RUN docker-php-ext-install pdo_mysql mysqli

# Enable apache modules
RUN a2enmod rewrite headers

WORKDIR /proyectos


RUN groupadd --gid 1010 node \
  && useradd --uid 1010 --gid node --shell /bin/bash --create-home node

# default user of host, 1000 same id as your user, this allow modify files in both container and Desktop Dev
RUN groupadd --gid 1000 user \
  && useradd --uid 1000 --gid user --gid sudo --shell /bin/bash --create-home user

# Install node y yarn (optional)

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs
# RUN npm install -g yarn
