<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Member\Home::index');
$routes->get('game-details/(:num)', 'Member\Home::gameDetails/$1');

$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->get('access-denied', 'Auth::accessDenied');
$routes->group('auth', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('login', 'Auth::login');
    $routes->add('logout', 'Auth::logout');
    $routes->post('register', 'Auth::saveRegister');
});

$routes->group('member', ['namespace' => 'App\Controllers', 'filter' => 'authMemberAdmin'], function ($routes) {
    $routes->get('addcart/(:num)', 'Member\Home::addcart/$1');
    $routes->get('removeitemcart/(:num)', 'Member\Home::removeitemcart/$1');
    $routes->get('addwishlist/(:num)', 'Member\Home::addwishlist/$1');
    $routes->get('game-details/(:num)', 'Member\Home::gameDetails/$1');


    // $routes->post('addcartpost', 'Member\Home::addcartpost');
    $routes->get('profile', 'Member\Home::profile');
    $routes->get('library', 'Member\Home::library');
    $routes->get('cart', 'Member\Home::cart');
    $routes->get('wishlist', 'Member\Home::wishlist');
    $routes->get('checkout/(:num)', 'Member\Home::checkout/$1');


    $routes->post('profile/update', 'Admin\Users::update_profile');

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

    // $routes->get('games/addcart/(:num)', 'Admin\Games::edit/$1');
    // $routes->get('games/addwishlish/(:num)', 'Admin\Games::edit/$1');

    $routes->get('members', 'Admin\Users::member');


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





