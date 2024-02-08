<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Routing Dashboard
$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/processLogin', 'AuthController::processLogin');
$routes->get('/logout', 'AuthController::logout');

//Routing Panen
$routes->get('panen', 'panen::index');
$routes->post('panen/simpan', 'panen::simpan');
$routes->post('panen/edit/(:num)', 'panen::edit/$1');
$routes->post('panen/delete/(:num)', 'panen::delete/$1');

//Routing Kategori
$routes->get('kategori', 'kategori::index');
$routes->post('kategori/simpan', 'kategori::simpan');
$routes->post('kategori/edit/(:num)', 'kategori::edit/$1');
$routes->post('kategori/delete/(:num)', 'kategori::delete/$1');

//Routing Penjualan
$routes->get('penjualan', 'penjualan::index');
$routes->post('penjualan/simpan', 'penjualan::simpan');
$routes->post('penjualan/edit/(:num)', 'penjualan::edit/$1');
$routes->post('penjualan/delete/(:num)', 'penjualan::delete/$1');
