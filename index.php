<?php

error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.

ini_set("error_log", "php-error.log");

error_log( "Hello, errors!" ); //Imprimir errores de log, en un documento independiente



require_once 'libs/Controller.php';
require_once 'libs/Model.php';
require_once 'libs/View.php';
require_once 'libs/Database.php';

require_once 'config/config.php';
//require_once 'controllers/Errores.php';

require_once 'libs/App.php';

$app = new App(); // Al tener la logica de URL en el constructor se va ejecutar apenas sea instanciado el obejto