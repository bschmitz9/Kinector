<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "login";
$route['404_override'] = '';
$route['sign_in'] = 'login/go_to_sign_in'; // this directs us to login/sign_in when a user clicks on the sign in button on the welcome screen
$route['register'] = 'login/go_to_register'; //this directs the user to the registration page
$route['registration'] = 'login/registration'; //this directs the form to the registration method where everything gets validated
$route['add'] = 'users/add_new_user'; //adds a new user from admin dashboard
$route['guest'] = 'login/guest_login'; //login as guest to skip registration/login
$route['dashboard'] = 'dashboard/user_dashboard'; //take user to user dashboard or admin dashboard
$route['logout'] = 'login/logout'; //logout the current user


//end of routes.php

