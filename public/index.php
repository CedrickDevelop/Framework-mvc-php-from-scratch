<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;
use App\Controllers\SiteController;
use App\Controllers\AuthController;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'welcome']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

// Auth routes
$app->router->get('/login', [AuthController::class, 'login']); // acceder à la page
$app->router->post('/login', [AuthController::class, 'checkLogin']); // recuperation info connexion
$app->router->get('/register', [AuthController::class, 'register']);// acceder à la page
$app->router->post('/register', [AuthController::class, 'checkRegister']); // recuperation info connexion

$app->run();
