<?php

/**
 * Created by PhpStorm.
 * User: Chanaka
 * Date: 15/3/2016
 * Time: 4:35 AM
 */
namespace src;

use Pimple\Tests\Fixtures\Service;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../config/services.php';


class General
{

    function homeAction(Request $request,Response $response){

        $service=new \services();
        $res=['message'=>'welcome to Tour-Lanka',
            //'status'=>$n_response->getStatusCode()
        ];
        return $service->echoResponse(200,$res,$response);
    }

}