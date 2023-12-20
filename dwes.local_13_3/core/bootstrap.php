<?php
require_once __DIR__ . '/App.php';
require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/../src/excepciones/NotFoundException.class.php';

$config = require_once __DIR__ . '/../app/config.php';
App::bind('config',$config); // Guardamos la configuración en el contenedor de servicios

$router = Router::load('app/routes.php');
App::bind('router',$router);

