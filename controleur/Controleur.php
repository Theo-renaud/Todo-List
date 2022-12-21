<?php

session_start();
// Set up an array of controllers and their corresponding action methods
$controllers = array(
  'user' => ['connexion', 'deconnexion'],
  'accueil' => ['accueil', 'error']
);

// Parse the request URL to determine the controller and action
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

// Get the controller and action from the request URL
if (empty($uri[1]) || empty($uri[2])){
  $controller = null;
  $action = null;
}
else {
  $controller = $uri[1];
  $action = $uri[2];
} 

// If the controller and action are not defined, use the default values
if (!$controller) $controller = 'accueil';
if (!$action) $action = 'accueil';

// Check if the requested controller and action are valid
if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    // If the controller and action are valid, include the corresponding file
    include_once ucwords($controller) . 'Controlleur.php';

    // Create a new instance of the controller and call the action method
    $klass = ucwords($controller) . 'Controlleur';
    $obj = new $klass;
    $obj->$action();

  } else {
    // If the action is not valid, include the error file
	echo "HE MERDE";
  }
} else {
  // If the controller is not valid, include the error file
  echo "HE MERDE";

}

?>