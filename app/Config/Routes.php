<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Member\Home::index');
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->get('access-denied', 'Auth::accessDenied');
$routes->group('auth', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('login', 'Auth::login');
    $routes->add('logout', 'Auth::logout');
    $routes->post('register', 'Auth::saveRegister');
});

$routes->group('admin', ['namespace' => 'App\Controllers', 'filter' => 'auth:Admin'], function ($routes) {
    // Dashboard
    $routes->add('dashboard', 'Admin\Dashboard::index');

    // Satuan
    $routes->get('games', 'Admin\Games::index');
    $routes->get('games/tambah', 'Admin\Games::tambah');
    $routes->get('games/edit/(:num)', 'Admin\Games::edit/$1');
    $routes->post('games/save', 'Admin\Games::save');
    $routes->post('games/update', 'Admin\Games::update');
    $routes->get('games/delete/(:num)', 'Admin\Games::delete/$1');

    $routes->get('members', 'Admin\Members::index');
    $routes->get('members/tambah', 'Admin\Members::tambah');
    $routes->get('members/edit/(:num)', 'Admin\Members::edit/$1');
    $routes->post('members/save', 'Admin\Members::save');
    $routes->post('members/update', 'Admin\Members::update');
    $routes->get('members/delete/(:num)', 'Admin\Members::delete/$1');

    $routes->get('transactions', 'Admin\Transactions::index');
    $routes->get('transactions/tambah', 'Admin\Transactions::tambah');
    $routes->get('transactions/edit/(:num)', 'Admin\Transactions::edit/$1');
    $routes->post('transactions/save', 'Admin\Transactions::save');
    $routes->post('transactions/update', 'Admin\Transactions::update');
    $routes->get('transactions/delete/(:num)', 'Admin\Transactions::delete/$1');

    $routes->get('users', 'Admin\Users::index');
    $routes->get('users/tambah', 'Admin\Users::tambah');
    $routes->get('users/edit/(:num)', 'Admin\Users::edit/$1');
    $routes->post('users/save', 'Admin\Users::save');
    $routes->post('users/update', 'Admin\Users::update');
    $routes->get('users/delete/(:num)', 'Admin\Users::delete/$1');

});





