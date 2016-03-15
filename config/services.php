<?php

/**
 * Created by PhpStorm.
 * User: Chanaka
 * Date: 15/3/2016
 * Time: 8:48 PM
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class services
{
    public function echoResponse($status_code,$message,Response $response){
        $n_response= $response->withStatus($status_code)->withHeader('Content-Type', 'application/json');
        $n_response->getBody()->write(json_encode($message));
        return $n_response;
    }

    public function validateEmail($email,Response $response) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $respo=array();
            $respo["error"] = true;
            $respo["message"] = 'Email address is not valid';
            return echoRespnse(400, $respo);
        }
        return $response;
    }

    public function verifyRequiredParams($required_fields,Response $response,Request $request) {
        $error = false;
        $error_fields = "";
        $request_params = array();
        $request_params = $_REQUEST;
        // Handling PUT request params
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            parse_str($request->getBody(), $request_params);
        }
        foreach ($required_fields as $field) {
            if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
                $error = true;
                $error_fields .= $field . ', ';
            }
        }

        if ($error) {
            // Required field(s) are missing or empty
            // echo error json and stop the app
            $respo = array();
            $respo["error"] = true;
            $respo["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
            return echoRespnse(400, $respo);
        }

        return $response;
    }
}