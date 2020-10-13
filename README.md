# Arthrose Bike Test

This app is a laravel school project. It's an MVP of a kind of social network for a bike event / administration interface for the organizers.

## Installation

Clone the repository  
`git clone https://github.com/JeanHerbaut/Arthrose_BikeTest.git`

Install npm dependencies  
`npm install`

install composer dependencies  
`composer install`

Create a new MySQL database  
`> CREATE DATABASE dbName;`

Add a MySQL user and grant him the rights on the db  
`> CREATE USER 'username'@'localhost';`  
`> ALTER USER 'username'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';`  
`> GRANT ALL PRIVILEGES ON dbName.* TO 'username'@'localhost';`  

Create a .env file and modify the database connexion section  
`cp .env.example .env`  

Create tables and populate them  
`php artisan migrate:install`  
`php artisan migrate:fresh --seed`  

Generate a Laravel encryption key  
`php artisan key:generate`  
`php artisan config:cache`  

Launch the app  
`php artisan serve`  

## Usage

Three users are initially created: visiteur@gmail.com, exposant@gmail.com and admin@gmail.com. All have access to different functionalities. The default password for those users is "password"

