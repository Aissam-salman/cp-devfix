# Devfix

Application symfony pour la gestion des réparations de téléphone, tablet, pc, etc.

## stack
- php smyfony
- mysql
- doctrine ORM
- docker mysql
- twig template

## Getting started

required :
- php >=8.1
- composer latest
- docker & docker compose
- symfony cli
- linux

setup .env file db_password before running the command

### for linux :
run in your terminal :
```bash
chmod +x makeInit.sh   # if is not executable
./makeInit.sh
# done go to localhost:8000
```
if this error : ERROR 2002 (HY000): Can't connect to local MySQL server through socket '/var/run/mysqld/mysqld.sock' (2)

rerun the script ./makeInit.sh

### manually run :

```bash
# clone the repository & cd into the repository
composer install
# modif .env
# start mysql server with wamp or docker as you want
# docker mysql
docker compose up
# open localhost:7070 phpmyadmin copy and paste script create;sql, run it
# and init.sql run it
symfony server:start
# localhost:8080