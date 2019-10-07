FROM composer
WORKDIR /app
RUN cd / && composer create-project mevdschee/php-crud-api /app

FROM php
WORKDIR /app
COPY --from=0 /app/api.php /app/api.php
RUN docker-php-ext-install pdo pdo_mysql
RUN perl -i -0pe 's/\$config = new Config\(\[.*\]\)/\$config = new Config(["username"=>"root","password"=>"root","address"=>"mysql","database"=>"crud"])/smg' /app/api.php
RUN tail /app/api.php
CMD php -S 0.0.0.0:8080 -t /app/
