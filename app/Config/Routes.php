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

$routes->group('admin-panel', ['namespace' => 'App\Controllers', 'filter' => 'auth:Admin'], function ($routes) {
    // Dashboard
    $routes->add('dashboard', 'Admin\Dashboard::index');

    // Satuan
    $routes->get('satuan', 'Satuan::index');
    $routes->get('satuan/tambah', 'Satuan::tambah');
    $routes->get('satuan/edit/(:num)', 'Satuan::edit/$1');
    $routes->post('satuan/save', 'Satuan::save');
    $routes->post('satuan/update', 'Satuan::update');
    $routes->get('satuan/delete/(:num)', 'Satuan::delete/$1');

});





