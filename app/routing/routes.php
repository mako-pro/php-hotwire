<?php

use app\controllers\WelcomeController;

/** @var \mako\http\routing\Routes     $routes    */
/** @var \mako\application\Application $app       */
/** @var \mako\syringe\Container       $container */
$routes->get('/', [WelcomeController::class, 'index'], 'index');
