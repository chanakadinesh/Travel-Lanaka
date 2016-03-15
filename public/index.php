<?php
/*use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;*/

require '../vendor/autoload.php';

session_start();

$settings=require __DIR__.'/../config/config.php';
$app=new Slim\App($settings);

//Adding dependencies
require __DIR__.'/../config/dependencies.php';

//Adding middleware
require __DIR__.'/../config/AppMiddleware.php';

//Adding routes
require __DIR__.'/../config/routes.php';

$app->run();