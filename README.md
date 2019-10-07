# RESTful API with CDC
That example demonstrates combining an api and change data capture pattern. 

* the mevdschee/php-crud-api project that allows to expose an api over mysql quickly
* the krowinski/php-mysql-replication that capture changes made to mysql by monitoring the binlog

A users table is automatically created in dump.sql so that we can add users using the following command using the API :

    curl -X POST http://localhost:8080/api.php/records/users -H 'Content-Type: application/json' -d '{"firstname":"Homer", "lastname":"Simpson", "email":"hs@example.com"}'

phpmyadmin is also included on http://localhost:8081 so you can try modifying data from it and see changes being captured as well