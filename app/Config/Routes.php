<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login_client','ClientController::loginPage');
$routes->get('/fill-clients', 'ClientController::fillTable');
$routes->post('/login/validate', 'ClientController::validateLogin'); // Valider la connexion
$routes->get('/logout', 'ClientController::logout'); 