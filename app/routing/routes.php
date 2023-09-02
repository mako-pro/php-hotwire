<?php

use app\controllers\WelcomeController;
use app\controllers\TurboDriveController;
use app\controllers\TurboFrameController;
use app\controllers\StimulusBasicController;
use app\controllers\StimulusAdvancedController;

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
    $routes->get('/load', [StimulusBasicController::class, 'load'], 'stimulus-basic.load');
    $routes->get('/list', [StimulusBasicController::class, 'list'], 'stimulus-basic.list');
    $routes->register(['GET', 'POST'], '/create', [StimulusBasicController::class, 'create'], 'stimulus-basic.create');
});

$routes->group(['prefix' => 'stimulus-advanced', 'patterns' => ['id' => '[0-9]+']], function($routes) {
    $routes->get('/', [StimulusAdvancedController::class, 'index'], 'stimulus-advanced.index');
    $routes->get('/list', [StimulusAdvancedController::class, 'list'], 'stimulus-advanced.list');
    $routes->get('/{id}', [StimulusAdvancedController::class, 'detail'], 'stimulus-advanced.detail');
    $routes->register(['GET', 'POST'], '/create', [StimulusAdvancedController::class, 'create'], 'stimulus-advanced.create');
    $routes->register(['GET', 'POST'], '/{id}/update', [StimulusAdvancedController::class, 'update'], 'stimulus-advanced.update');
    $routes->register(['GET', 'POST'], '/{id}/delete', [StimulusAdvancedController::class, 'delete'], 'stimulus-advanced.delete');
    $routes->get('/modal', [StimulusAdvancedController::class, 'modal'], 'stimulus-advanced.modal');
});
