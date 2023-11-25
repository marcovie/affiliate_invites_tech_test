## Description

This is a basic system with one html page. used cdn boostrap to make look a little better. Have one route that has XSS
stripping and HTTP Headers under the middleware. Using Service and Action pattern. Have a global try catch. That emails
if any exception occurs. Using Laravel 10 with single welcome blade file.

Also included a Feature and 2 Unit tests for this project.

## Middleware added
app\Http\Middleware\XssSanitization.php

app\Http\Middleware\SecureHeaders.php

## Mailing/Error Handling
app\Exceptions\Handler.php
app\Mail\ErrorAlert.php

resources\views\emails\error_alert.blade.php

## Steps to use the api from Testing to Postman
```bash
Step 1 - git clone https://github.com/marcovie/affiliate_invites_tech_test
```
[https://github.com/marcovie/affiliate_invites_tech_test](https://github.com/marcovie/affiliate_invites_tech_test)
```bash
Step 2 - "composer install"

Step 3 - Make copy of the ".env.example" file and change the copy name to .env open 
file and change settings required.

Step 4 - Update in .env file the "APP_DEV_EMAIL" to a dev email to so that if any errors occur you can see the email for it.

Step 5 - For full experience if Critical errors occur create account on "https://mailtrap.io/" 
and put username and password into .env file but not required as shouldnt have Critical error but it 
is there if needed.

Step 6 - No DB is needed for this task.

Step 7 - In command prompt in the root of this laravel project. Run this commands below:

Step 8 - "php artisan key:generate"

Step 9 - "composer install"

Step 10 - Either run clearcache.bat if on windows or can run following commands
php artisan cache:clear
php artisan route:clear
php artisan view:clear

php artisan route:cache
php artisan config:cache
php artisan view:cache

php artisan clear-compiled 
composer dump-autoload
php artisan optimize

Step 11 - "php artisan serve" - Which should give you url -> "http://127.0.0.1:8000"
By Default area is set to 100 km. The Dublin Lat/Lon is set in AffiliateService as public variable.

Step 12 - To run tests go to command prompt run: "php artisan test" to get tests to run. (Make sure composer install has run)
```

## Must have Requirements

# Dev Code Test

The JSON-encoded affiliates.txt file attached contains a shortlist of affiliate contact records - one per line.
Stored under "storage\app\public\affiliate_list\affiliates.txt"

We want to invite any affiliates that lives within 100km of office for some food and drinks using this text file as the 
input (without being altered).

# Task
Write a program that will read the full list of affiliates from this txt file and output the name and IDs of matching 
affiliates within 100km, sorted by Affiliate ID (ascending).

You can use the first formula from this [Wikipedia article](https://en.wikipedia.org/wiki/Great-circle_distance) to 
calculate distance. Don't forget, you'll need to convert degrees to radians.

The GPS coordinates for Office are 53.3340285, -6.2535495.

You can find the affiliate list in this repository called affiliates.txt. 
Stored under "storage\app\public\affiliate_list\affiliates.txt"

Please don’t forget, your code should be production ready, clean and tested!

## Nice to haves:
- Demonstrate understanding of MVC
- Unit Tests
- Basic HTML output
- Usage of a PHP Framework (Laravel)
- Use the original txt file as input 

