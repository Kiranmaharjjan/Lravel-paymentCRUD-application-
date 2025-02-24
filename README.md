# Payment System - Laravel Project

## Introduction
This is a Laravel-based payment management system that supports user management, payment tracking, and basic authentication. The system is built using **Laravel**, **MySQL**, and **Bootstrap**.

## Features
✅ User Management (Add, Edit, Delete, List Users)  
✅ Payment Management (Add, Edit, Delete, List Payments)  
✅ Authentication (Login, Logout)  
✅ Simple UI using Bootstrap  

---

#  Installation & Setup Instructions
## Clone the Repository:
- git clone https://github.com/Kiranmaharjjan/Lravel-paymentCRUD-application-.git  
- cd Lravel-paymentCRUD-application-

## Install Dependencies:
Make sure you have PHP, Composer, Node.js, and MySQL installed. Then, run:
- composer install
-npm install

## Set Up Environment Variables:
Copy the .env.example file to .env:
- cp .env.example .env  
Then, open .env in a text editor and update your database credentials:  
- DB_CONNECTION=mysql  
- DB_HOST=127.0.0.1  
- DB_PORT=3306  
- DB_DATABASE=your_database_name  
- DB_USERNAME=your_db_user  
- DB_PASSWORD=your_db_password
  
## Generate Application Key:
Run the following command to generate a unique application key:
- php artisan key:generate

## Run Migrations to Set Up the Database:
- php artisan migrate
If you want sample users and payments to be inserted, you can use:
- php artisan db:seed

##  Link Storage & Set Permissions:
- php artisan storage:link
- chmod -R 777 storage bootstrap/cache

##  Start the Application:
Run the Laravel development server:
- php artisan serve

