<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::ind


// Rute untuk menampilkan halaman login
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/starter', 'Home::starter', ['filter' => 'auth']);

 // Rute untuk proses login
 $routes->post('auth/processLogin', 'AuthController::processLogin', ['as' => 'auth/processLogin']);

$routes->group('/auth', function ($routes) {
   $routes->get('/', 'AuthController::index');
   $routes->post('login', 'AuthController::login');
   $routes->get('logout', 'AuthController::logout');
});

$routes->get('/dashboard', 'Home::index', ['filter' => 'auth']);


$routes->group('user', ['filter' => 'auth'], function ($routes) {
   $routes->get('/', 'UserController::index');
   $routes->get('create', 'UserController::create');
   $routes->post('store', 'UserController::store');
   $routes->post('update/(:num)', 'UserController::update/$1');
   $routes->get('edit/(:num)', 'UserController::edit/$1');
   $routes->get('delete/(:num)', 'UserController::delete/$1');
   $routes->get('show/(:num)', 'UserController::show/$1');
});

$routes->group('karyawan', ['filter' => 'auth'], function ($routes) {
   $routes->get('/', 'KaryawanController::index');
   $routes->get('create', 'KaryawanController::create');
   $routes->post('store', 'KaryawanController::store');
   $routes->post('update/(:num)', 'KaryawanController::update/$1');
   $routes->get('edit/(:num)', 'KaryawanController::edit/$1');
   $routes->get('delete/(:num)', 'KaryawanController::delete/$1');
   $routes->get('show/(:num)', 'KaryawanController::show/$1');
});

$routes->group('datarekening', ['filter' => 'auth'], function ($routes) {
   $routes->get('/', 'DataRekeningController::index');
   $routes->get('create', 'DataRekeningController::create');
   $routes->post('store', 'DataRekeningController::store');
   $routes->post('update/(:num)', 'DataRekeningController::update/$1');
   $routes->get('edit/(:num)', 'DataRekeningController::edit/$1');
   $routes->get('delete/(:num)', 'DataRekeningController::destroy/$1');
   $routes->get('show/(:num)', 'DataRekeningController::show/$1');
});
