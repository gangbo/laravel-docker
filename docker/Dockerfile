FROM php:7.3-fpm
# Set working directory
WORKDIR /var/www
# Install dependencies
RUN sed -i 's/deb.debian.org/mirrors.aliyun.com/g' /etc/apt/sources.list
RUN apt-get update
RUN apt-get install -y \
    build-essential \
    libpng-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl
# Clear cache
#RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd
# Download via https://pecl.php.net/package/swoole
RUN pecl install ./docker/swoole-4.5.2.tgz

# Install composer
COPY ./docker/composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www
# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www
# Expose port 9000 and start php-fpm server
EXPOSE 9000
EXPOSE 1215
CMD ["php-fpm"]
