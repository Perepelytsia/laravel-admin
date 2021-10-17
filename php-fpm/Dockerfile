FROM phpdockerio/php80-fpm:latest
WORKDIR "/app"
# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive
# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install mc php-pear php8.0-xdebug php8.0-mysql php8.0-dev php-redis php8.0-bz2 php8.0-curl php8.0-dba php8.0-enchant php8.0-gd php8.0-intl php8.0-ldap php8.0-phpdbg php8.0-pspell php-raphf php8.0-soap php-ssh2 php8.0 php8.0-pdo php8.0-dom php8.0-xsl php-yaml\
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && echo "All installed" \
    && sleep 3\
    && docker-php-ext-enable xdebug\
# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  --version=2.1.9