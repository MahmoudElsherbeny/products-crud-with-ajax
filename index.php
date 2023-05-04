<?php 

use App\Core\DBConnection;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for this application. 
| We just need to utilize it! We'll require it here so we don't need to manually load our classes.
|
*/

require_once 'vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Define Configs
|--------------------------------------------------------------------------
|
| Define our application configs, to simply use it for this application. 
|
*/
require_once 'config/app.php';

/*
|--------------------------------------------------------------------------
| Managing Urls
|--------------------------------------------------------------------------
|
| Define our application urls for each action. 
|
*/
include('routes.php');

/*
|--------------------------------------------------------------------------
| Connect To Database
|--------------------------------------------------------------------------
|
| Define databse connection configs, to simply use it for this application. 
|
*/
$db = new DBConnection();
