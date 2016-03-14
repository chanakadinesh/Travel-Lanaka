<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
spl_autoload_register(function ($classname) {
    require ("../src/" . $classname . ".php");
});
include_once '../config/config.php';
include_once "../config/routes.php";

/*----------------------------------------------------------------------------------------*/
//Adding configurations
$config['displayErrorDetails'] = true;
$config['db']['host']   = DB_USERNAME;
$config['db']['user']   = DB_USERNAME;
$config['db']['pass']   = DB_PASSWORD;
$config['db']['dbname'] = DB_NAME;

/*----------------------------------------------------------------------------------------*/

$app = new \Slim\App(["settings"=>$config]);

//(Dependency Injection Container
$container = $app->getContainer();
$container['logger']=function($c){  //adding logger
    $logger=new \Monolog\Logger('my_logger');
    $file_handler=new Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};
$container['db']=function($c){  //adding database connection
    $db=$c['settings']['$db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};


//Routing Paths
/*-----------------------------------------------------------------------------*/

$app->get(home, function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Welcome to Travel Lanka    ");

    return $response;
});

$app->get(post_register, function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Welcome to Travel Lanka    ");

    return $response;
});

/*----------------------------------------------------------------------------------------*/
$app->run();