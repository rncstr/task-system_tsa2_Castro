<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// --- PUBLIC ROUTES (Viewable by anyone) ---
$routes->get('/', 'Pages::welcome');
$routes->get('/about', 'Pages::about');
$routes->get('/profile', 'Pages::profile');
$routes->get('/tasks', 'Tasks::index');

// --- AUTHENTICATION ROUTES ---
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

// --- PROTECTED ROUTES (Requires Login) ---
$routes->group('tasks', ['filter' => 'auth'], static function($routes) {
    $routes->get('new', 'Tasks::new');
    $routes->post('create', 'Tasks::create');
    $routes->get('edit/(:num)', 'Tasks::edit/$1');
    $routes->post('update/(:num)', 'Tasks::update/$1');
    $routes->get('delete/(:num)', 'Tasks::delete/$1'); // Archiving route
});
