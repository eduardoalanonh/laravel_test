

----------

# Laravel test

## Installation

Clone the repository

    git clone https://github.com/eduardoalanonh/laravel_test.git

Switch to the repo folder

    cd laravel-test

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

.ENV needs contain 
    
    SESSION_DRIVER=cookie
    SESSION_DOMAIN=localhost
    SANCTUM_STATEFUL_DOMAINS=localhost:8080 (front project port)

Generate a new application key

    php artisan key:generate



Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone  https://github.com/eduardoalanonh/laravel_test.git
    cd laravel-test
    composer install
    cp .env.example .env
    php artisan key:generate
  

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**


Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

----------

# Code overview
- PHP 8.0.9
- laravel/framework 8.54,
- laravel/sanctum 2.11,





