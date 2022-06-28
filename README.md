# - Internship assignment

## General information
* Author: `Bechahed Firas & Essaied Iheb`
* Contact info: `bechahedf@gmail.com , beetiheb@gmail.com`
* Creation date: `26/11/2022`
* Laravel version: `5.8`
* PHP version: `7.3`
* Database: `MySQL`

<br/>

## Requirements

* PHP 7.2+ (https://www.php.net/manual/en/install.php)
* Composer (https://getcomposer.org/download/)

<br/>

## How to install:
You can read the Laravel 5.8 documentation for any additionel information (https://laravel.com/docs/5.8/installation).

### 1) Install laravel packages
Please note that you need to have the composer already installed in order to run this steps.
```
> composer global require laravel/installer
> composer install
```

### 2) Config database
* Import the database in your administration tool (PhpMyAdmin): `event.sql`.
* In the project folder open the `.env` file.
* Change the database config depending on your machine.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1       //Host (localhost for local use)
DB_PORT=3306            //Default php port
DB_DATABASE=event  //Database name (as imported)
DB_USERNAME=root        //Php username (root by default)
DB_PASSWORD=            //Php password (empty by default)
```

## How to run:
You can chose from those method:
### 1) Simple method (use www folder)

* Copy this folder under `www`
* Open your `localhost` and access to this folder.
* Open the `public` folder.
* The application will run automatically

OR
### 2) Run the application from any location
```

> php artisan serve
```
<br/>

<br/>

## Documentation
### 1) Views & layouts
* All views and layouts exists in the resources folder 
( `resources > views` ).
* All JS & CSS files and pictures exists in the public folder ( `public` ).

### 2) Models & Controllers
* All models exists in the app folder 
( `app` ).
* All controllers exists in the controllers folder 
( `app > http > controllers` ).

### 2) Routing
* All routes are definded in the web.php file ( 
`routes > web.php` ).

<br/>

## Login Password (Just for testing purpose)

* admin:admin@admin.com
* pass: 12345678

### 3) Serveur mailing gmail
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=exemple@gmail.com
MAIL_PASSWORD=qcdbfjxsjxbbvfgt
MAIL_ENCRYPTION=ssl

### 4) PayPal config
PAYPAL_CLIENT_ID=AcHllRTn_B6CzSF_GfYEzIHxkJFwXwSPcvzDs9UG7Jms4w8X3YT3gfHPkUMZDTwZLpj8Dqaj307fYeu4 
PAYPAL_CLIENT_SECRET=EFvAykLIrJZ-4rz_3SH6sYEBbxKC3Kug7QJYdLGwBvTvA7o07J-Zqt4Igg8Ro_bhcHxgmftZCmNzxuYQ
PAYPAL_CURRENCY=USD