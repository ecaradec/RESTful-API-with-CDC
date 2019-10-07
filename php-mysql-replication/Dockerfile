FROM php
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    curl \
 && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install sockets bcmath zip pdo pdo_mysql
WORKDIR /app
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /app && composer require krowinski/php-mysql-replication
RUN curl https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh -o /usr/local/bin/wait-for-it.sh && chmod u+x /usr/local/bin/wait-for-it.sh
CMD php /app/main.php