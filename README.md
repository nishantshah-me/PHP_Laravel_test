# Readme

Welcome to our coding assessment! 

This code represents an extremely basic prototype to be used as a baseline for question 1. 

## Getting Started
If your environment is already configured with [php](https://www.php.net/manual/en/install.php), [composer](https://getcomposer.org/doc/00-intro.md), and [mysql](https://dev.mysql.com/downloads/mysql/) or [sqlite](https://sqlite.org/download.html) you should be able to run this code locally. Another option if you prefer to use Docker is to run the app through [Laravel Sail](https://laravel.com/docs/master/sail) (a wrapper around docker). 

If you run through Sail Note that any commands in Laravel documentation that refer to `sail` will need to be run as `./vendor/bin/sail` from the app directory and any commands that refer to `artisan` will need to be run as `./vendor/bin/sail php artisan`

### Option 1: Install Locally with PHP and Composer
1. From the extracted directory install dependencies with `composer install`
2. You will need to replace the lines for `DB_USERNAME` and `DB_PASSWORD` in `.env` with values that can access your locally running mysql and create databases and database dumps. (*Alternatively you could instead use sqlite by replacing the `DB_CONNECTION=mysql` line with `DB_CONNECTION=sqlite` and replacing `DB_DATABASE=simple_circus` with the absolute path to `./database/database.sqlite`. If you do this skip to step 5*)
3. Create the initial database by calling `php artisan db:create`.
4. We have created some sample data for you to use as you develop. You can use the artisan command `php artisan db:import` to import it into your local database. This will copy the full schema and data. If you don't want the sample data you can simply call `php artisan migrate`
5. Start the local development server with `php artisan serve`
6. You should now have access to the application from your `localhost:8000` in a web browser.

### Option 2: Install with Sail
0. You will need [docker](https://docs.docker.com/engine/install/) and [docker-compose](https://docs.docker.com/compose/install/) to run laravel sail. 
1. From the extracted directory the following command to install Sail and app dependencies (see details [here](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects))
```
docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/opt" \
        -w /opt \
        laravelsail/php80-composer:latest \
        composer install --ignore-platform-reqs
```
2. In `.env` replace the line `DB_HOST=127.0.0.1` with `DB_HOST=mysql`. This will point the server container to the mysql container.
3. Start the application with `./vendor/bin/sail up`. On the first run this could take a long time. Note that if you have services for `MySQL` and/or Apache running you may need to stop them. 
4. We have created some sample data for you to use as you develop. Use the artisan command `./vendor/bin/sail php artisan db:import` to import it into your local database. This will copy the full schema and data.
5. You should now have access to the application from your `localhost` in a web browser

## Submission
1. Populate `discussion.md` with responses to any discussion questions
2. If you added any data for testing, please make a sql dump by running `./vendor/bin/sail php artisan db:import`
3. Create a zip file with your code (if you can deselect the `vendor` directory when making your zip, things will run smoother)
4. Submit your zip file and your personal details to the assignmend page [here]()

