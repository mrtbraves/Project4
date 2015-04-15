<?php

$autoLoader =  realpath(
    __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php'

);

require $autoLoader;


// Load server specific configuration data.  Should
// check an environment variable load the appropriate
// server configuration file.


\Slim\Slim::registerAutoloader();

require 'config.php';


$app = new \Slim\Slim(

    $config['app']['slim-config']
);

$app->get('/', function () {
	
    $logincontroller = new \Controllers\AuthController();

    $logincontroller->action();
});

$app->get('/login/', function () {
	
    $logincontroller = new \Controllers\AuthController();

    $logincontroller->action();
});

$app->post('/login/', function () use ($app) {
    $username = $app->request()->params('username');
    $password = $app->request()->params('password');

    $logincontroller = new \Controllers\AuthController();

    $logincontroller->login($username, $password);
});

$app->get('/welcome/', function () use ($app) {


    $logincontroller = new \Controllers\AuthController();

    $logincontroller->login();
});



$app->run();

