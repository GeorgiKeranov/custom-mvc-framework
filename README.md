# custom-mvc-framework
Custom MVC framework with Login and Register functionality built with PHP. The application itself is a simple registration + login app. After a successful login the
user is redirected to a listing of all users. That's basically it!

## Table of Contents
- [Technologies used](#technologies-used)
- [Functionalities](#functionalities)
- [Installation](#installation)
- [Credentials](#credentials)

## Technologies Used
- PHP Version 7.4.5
- Apache 2.4
- Composer 1.7.2
- MySQL 5.7

## Functionalities
- Register in the application
- Login to the application
- See a list of all users if you are a authenticated user
- Password is stored with a bcrypt hash algorithm

## Installation
1. Import the database dump file from ["database/georgi_custom_mvc_framework.sql"](https://github.com/GeorgiKeranov/custom-mvc-framework/blob/master/database/georgi_custom_mvc_framework.sql) into a MySQL database.
2. Open terminal and install the composer with this command ```composer install```
3. You will have to set your own database credentials in ["/config.json"](https://github.com/GeorgiKeranov/custom-mvc-framework/blob/master/config.json) file.

## Credentials
You can use these credentials to log in:
```
Username - username
Password - password
```
