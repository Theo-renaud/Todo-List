<?php


require_once(__DIR__.'/config/config.php');
require_once(__DIR__.'/config/Autoload.php');
require_once(__DIR__.'/config/Router.php');

Autoload::charger();

$userControlleur = new UserControlleur();
//$userControlleur->connexion();

$router = new AltoRouter();

$router->map('GET', '/', 'UserControlleur');
// $router->map( 'GET|POST', '/user/[i:id]/[a:action]?', 'UserController');

$id = 0;
$match = $router->match();

var_dump($match);

$action = array();
$id=array();

if (!$match) { 
    echo "404"; die; 
}

if ($match) {

    $controller=$match['target'] ?? null;
    $action=$match['params']['action'] ?? null;
    $id=$match['params']['id'] ?? null;

    try {
        $controller = '\\controleur\\' . $controller;
        $controller = new $controller;
        if (is_callable(array($controller, $action))) {
            call_user_func_array(array($controller, $action),
                array($match['params']));
        }
    }
    catch (Error $error){print 'pas de controller';}
}

?> 
