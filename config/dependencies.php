<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require "../src/General.php";
require "../src/User.php";
require "../src/Comment.php";
require "../src/Location.php";
require "../src/Rate.php";

$container=$app->getContainer();

$container['logger'] = function ($c) {   //adding logger
    $settings = $c['settings'];
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};

$container['db']=function($c){  //adding database connection
    $db=$c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['DB_HOST'] . ";dbname=" . $db['DB_NAME'],
        $db['DB_USERNAME'], $db['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};


//Injecting classes
$container['General']=function($c){
    return new \src\General();
};
$container['Comment']=function($c){
    return new \src\Comment();
};
$container['Location']=function($c){
    return new \src\Location();
};
$container['Rate']=function($c){
    return new \src\Reate();
};
$container['User']=function($c){
    return new \src\User();
};
$container['services']=function($c){
    return new services();
};
