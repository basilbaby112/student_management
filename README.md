# Student Management System

This is a Student Management System developed using Laravel- 11.

## Requirements

- PHP >= 8.2
- Composer
- MySQL
- Apache or Nginx web server

## Installation

1. Clone the repository:
2. Navigate to the project directory:
    cd student-management-system
3. Install PHP dependencies using Composer: 
    composer install
4. Copy the .env.example file to .env:
    cp .env.example .env
5. Generate application key:
    php artisan key:generate
6. Update the .env file with your database credentials.
7. Run database migrations:
    php artisan migrate

To run the application, you need to start a web server. If you're using LAMP or WAMP, make sure the Apache (or Nginx) and MySQL services are running.

You can start the Laravel development server using the following command:
    php artisan serve

This will start a development server at http://localhost:8000.

You can access the application by navigating to the URL in your web browser.