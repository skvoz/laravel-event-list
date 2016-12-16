##Install
- create project folder ex. laravel-tz
- $ cd laravel-tz
- $ rm -rf laradoc
- $ git clone https://github.com/skvoz/laravel-event-list.git .
- install composer global
- $ comopser install
- create .env file in root , copy data from example
- install docker
- git submodule add https://github.com/LaraDock/laradock.git laradoc
- docker-compose up -d nginx php-fpm postgres ( if error change port nginx: 80 to 801, 5432 on pqstgres: 5433 in docker-compose.yml)
- look at container list $ docker ps
- go to main container $ docker exec -it <laradoc_workspace id > bash
- in docker container  $ php artisan migrate
- in docker container  $ php artisan db:seed

## example .env
```
APP_ENV=local
APP_KEY=base64:yDs3MexbK/ANkCSrUr/oIBmKDDcpIcsX6wUA/qPJA1k=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=pgsql
DB_HOST=172.21.0.4 //this ip locck at docker inspect <id docker conatainer with postgres
DB_PORT=5433
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
##Interests git repo
 - appzcoder/crud-generator 
 - https://github.com/laravel-backpack 

