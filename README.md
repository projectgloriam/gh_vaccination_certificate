# About Ghana Vaccination Center

Ghana Vaccination Center is a web application for taking inventory of patients who have been vaccinated.

## Setup your email for sending alerts
Make sure 2 step verification is on for the steps above to work. 

The App uses Gmail to send alerts to clients. All you have to do is go to your Google Account settings and generate an *App password*.
`Account -> Security -> App passwords`

Upon creating a new vaccinated user, you'll be prompted for your Gmail email and password. Use the generated *App password* in place of your password.

## PHP first time installation
Install WAMP server from `https://www.wampserver.com/en/` and Composer from `https://getcomposer.org/download/`.

## How to setup
Clone and navigate to the the application's directory `cd \gh_vaccination_certificate`.

### First time use
Run `composer update` to install the app's dependencies. Also run `npm install` to install application frontend dependencies and build and version the assets for production... `npm run build`

Copy `.env.example` file and rename it to `.env` to get the default configuration. 
Create a new file in the `database` folder and name it `database.sqlite` then run `php artisan migrate:fresh --seed`.

The `spatie/media-library` dependency has a bug. To avoid this issue, please copy `MediaCollection.php` from `public` folder and replace the same file at `C:\Users\fadom\source\repos\gh_vaccination_certificate\vendor\spatie\laravel-medialibrary\src\MediaCollections\Models\Collections`.

### Run the app server
Run `php artisan serve` and navigate to `http://localhost:8000/login`

### Default Login
Default login details will be 
Email: `admin@ghanavaccination.com`
Password: `admin`