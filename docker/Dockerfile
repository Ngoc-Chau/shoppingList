FROM php:8.0-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    vim \
    sudo \
    unzip
# RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
# RUN apt -y install nodejs
# RUN apt -y install gcc g++ make
# RUN curl -sL https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
# RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
# RUN apt update && sudo apt install yarn
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY docker/php/php.ini /usr/local/etc/php/
COPY docker/php/php.ini /usr/local/etc/php/conf.d/

# Create system user to run Composer and Artisan Commands

# Set working directory
WORKDIR /var/www/html

EXPOSE 9000
