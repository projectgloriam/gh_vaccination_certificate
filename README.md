## About Ghana Vaccination Center

Ghana Vaccination Center is a web application for taking inventory of patients who have been vaccinated.

## Setup your email for sending alerts
Make sure 2 step verification is on for the steps above to work. The Email uses Gmail to send alerts to clients. All you have to do is go to your Google Account settings and generate an App password.
`Account -> Security -> App passwords`

Upon creating a new vaccinated user, you'll be prompted for your Gmail email and password. Use the generated App password in place of your password.

# How to setup
Clone and navigate to the the application's directory `cd \gh_vaccination_certificate`.

## First time use
If it's the first time using the database or some would call a 'factory reset'.
Run `php artisan migrate:fresh --seed`

Be sure to delete all folders in `storage\app\public` to remove any media.

## Run the app server
Run `php artisan serve`