# How to run the project

- Make sure you have WAMP or LAMP installed on your machine http://www.wampserver.com/en/
- Download composer https://getcomposer.org/download/
- Pull Laravel/PHP project from git provider
- Rename `.env.example` file to `.env`inside your project root and fill the variable `THE_MOVIE_DB_API=` with a valid API key 
- Open the console and `CD` into your project root directory
- Run `composer install` or `php composer.phar install`
- Run `php artisan key:generate`
- Run `php artisan serve`
