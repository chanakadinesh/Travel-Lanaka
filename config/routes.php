<?php
/**
 * Created by PhpStorm.
 * User: Chanaka
 * Date: 14/3/2016
 * Time: 8:55 PM
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

define('home', '/');
//User Handling
define('post_register', '/register');
define('post_admin_register', '/admin_register');
define('post_login', '/login');
define('put_removeUser', '/user/remove/{email}');
//Location Handling
define('get_SuggestedLocationsByMap', '/locations/map/{latitude}/{longitude}');
define('get_LocationById', '/location/id/{id}');
define('get_LocationByText', '/location/text/{name}');
define('get_SuggestedLocationsByText', '/locations/text/{name}');
define('post_AddLocation', '/location/new');
define('put_UpdateLocation', '/location/update/{id}');
define('put_RemoveLocation', '/location/remove/{id}');
//Comment Handling
define('post_addComment', '/comment/add/{location_id}');
define('put_updateComment', '/comment/update/{id}');
define('get_comments', '/comments/{start_id}/{number_of_items}');
define('get_comment', '/comment/{id}');
define('put_RemoveComment', '/');
define('post_rateComment', '/rate/{comment_id}');
define('post_contactAdmin', '/contact');//Send message to the admin
//define('home', '/');
//define('home', '/');

$app->get(home,'General:homeAction');