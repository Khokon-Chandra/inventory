## Banking System

## Installation

Clone this repository first

```bash
https://github.com/Khokon-Chandra/banking-system.git
````
Composer Update
````bash
composer update
````

copy .env.example as .env

Configure database connection

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=banking_system
DB_USERNAME=root
DB_PASSWORD=
```
``
Run migration command
```bash
php artisan migrate --seed
```
Run project
```bash
php artisan serve
````
Email Address :
```bash 
admin@admin.com
````
password :
```bash 
12345678````

