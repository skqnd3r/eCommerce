# eCommerce
Shopping website developped with Laravel.

## Dependencies
To be runned, Laravel need `php`, `composer`, `mysql` or `mariadb`. 

## Laravel
Install Laravel with :
```
$ php composer-setup.php --install-dir=bin
$ composer global require "laravel/installer=~1.1"
$ composer install
```

## Setup
Create new `DATABASE` and `USER`:
```
CREATE DATABASE shoptafleur
CREATE USER 'admin'@'localhost' IDENTIFIED WITH mysql_native_password BY '';
```
Find the file `.env.example` and rename it into `.env`.
Inside it find the following lines ( ~11-16 ) and make sure they look like these :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shoptafleur
DB_USERNAME=admin
DB_PASSWORD=
```

Then run thoses lines :
```
$ php artisan key:generate                //Create key
$ php artisan migrate:refresh --seed      //Create tables and run seeders
$ php artisan storage:link                //Link storage->public
```

## Running
```
php artisan serve
```
### Login as Admin
```
email:      admin@email.com
password:   password
```
### Login as User
```
email:      client@email.com
password:   password
```
