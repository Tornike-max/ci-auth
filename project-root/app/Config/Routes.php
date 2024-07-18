<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');

$routes->post('/registerUser', 'AuthController::registerUser');
$routes->post('/loginUser', 'AuthController::loginUser');
$routes->post('users/uploadImage', 'AuthController::uploadImage');


$routes->get('/dashboard', 'DashboardController::index');
