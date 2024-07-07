<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(false);

$routes->get('/', 'Login::index');
$routes->post('/login/authenticate', 'Login::authenticate'); // POST route for handling login form submission
$routes->post('/logout', 'Login::logout'); // POST route for handling logout
$routes->get('/view_user', 'User::view_user');
$routes->get('/success', 'User::success');
$routes->get('/dashboard', 'User::dashboard'); // Route for user dashboard
$routes->get('/add_user', 'User::add_user');
$routes->post('/add_user', 'User::add_user');
