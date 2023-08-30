<?php

use app\controllers\WelcomeController;
use app\controllers\TurboDriveController;

/** @var \mako\http\routing\Routes     $routes    */
/** @var \mako\application\Application $app       */
/** @var \mako\syringe\Container       $container */
$routes->get('/', [WelcomeController::class, 'index'], 'index');

$routes->group(['prefix' => 'turbo-drive', 'patterns' => ['id' => '[0-9]+']], function($routes) {
    $routes->get('/', [TurboDriveController::class, 'index'], 'turbo-drive.index');
    $routes->register(['GET', 'POST'], '/create', [TurboDriveController::class, 'create'], 'turbo-drive.create');
});
