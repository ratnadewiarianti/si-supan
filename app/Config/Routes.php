<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::ind


// Rute untuk menampilkan halaman login
$routes->get('/', 'AuthController::login', ['as' => 'login']);
$routes->get('login', 'AuthController::login', ['as' => 'login']);

 // Rute untuk proses login
 $routes->post('auth/processLogin', 'AuthController::processLogin', ['as' => 'auth/processLogin']);

 // Rute untuk logout
 $routes->get('logout', 'AuthController::logout', ['as' => 'logout']);

    $routes->get('/dashboard', 'Home::index');

    // USER
    $routes->get('/user', 'UserController::index', ['as' => 'user/index']);
    $routes->get('/user/create', 'UserController::create', ['as' => 'user/create']);
    $routes->post('/user/store', 'UserController::store', ['as' => 'user/store']);
    $routes->get('/user/show/(:num)', 'UserController::show/$1', ['as' => 'user/show']);
    $routes->get('/user/edit/(:num)', 'UserController::edit/$1', ['as' => 'user/edit']);    
    $routes->post('/user/update/(:num)', 'UserController::update/$1', ['as' => 'user/update']);
    $routes->get('/user/delete/(:num)', 'UserController::delete/$1', ['as' => 'user/delete']);
