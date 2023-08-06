## About
Test Task Laravel PHP CRUD

## Start Project
This project is run in Docker with Laravel Sail.

### Run Project
Make sure you have installed and updated Docker and Laravel Sail.   
(For more details https://laravel.com/docs/10.x/sail)  
Clone the project and navigate to the project directory.
```
cp .env.example .env
php artisan key:generate
sail up -d
```
### Run Migrations
```
sail php artisan migrate
```
### There is no frontend, only some views are implemented
