<?php

use app\controllers\WelcomeController;
use app\controllers\TurboDriveController;
use app\controllers\TurboFrameController;
use app\controllers\StimulusBasicController;

/** @var \mako\http\routing\Routes     $routes    */
/** @var \mako\application\Application $app       */
/** @var \mako\syringe\Container       $container */
$routes->get('/', [WelcomeController::class, 'index'], 'index');

$routes->group(['prefix' => 'turbo-drive', 'patterns' => ['id' => '[0-9]+']], function($routes) {
    $routes->get('/', [TurboDriveController::class, 'index'], 'turbo-drive.index');
    $routes->get('/list', [TurboDriveController::class, 'list'], 'turbo-drive.list');
    $routes->register(['GET', 'POST'], '/create', [TurboDriveController::class, 'create'], 'turbo-drive.create');
});

$routes->group(['prefix' => 'turbo-frame', 'patterns' => ['id' => '[0-9]+']], function($routes) {
    $routes->get('/', [TurboFrameController::class, 'index'], 'turbo-frame.index');
    $routes->get('/list', [TurboFrameController::class, 'list'], 'turbo-frame.list');
    $routes->get('/{id}', [TurboFrameController::class, 'detail'], 'turbo-frame.detail');
    $routes->register(['GET', 'POST'], '/create', [TurboFrameController::class, 'create'], 'turbo-frame.create');
    $routes->register(['GET', 'POST'], '/{id}/update', [TurboFrameController::class, 'update'], 'turbo-frame.update');
    $routes->register(['GET', 'POST'], '/{id}/delete', [TurboFrameController::class, 'delete'], 'turbo-frame.delete');
});

$routes->group(['prefix' => 'stimulus-basic'], function($routes) {
    $routes->get('/', [StimulusBasicController::class, 'index'], 'stimulus-basic.index');
    $routes->get('/counter', [StimulusBasicController::class, 'counter'], 'stimulus-basic.counter');
});
