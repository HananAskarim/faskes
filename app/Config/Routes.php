<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Web');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Web::index');
$routes->get('about', 'Web::about');
$routes->get('kategori', 'Web::kategori');

$routes->get('login', 'Auth::login');
$routes->post('auth/process', 'Auth::process');
$routes->get('logout', 'Auth::logout');

$routes->get('pages', 'Admin/Pages::index');

$routes->get('kategori', 'Admin/Kategori::index');
$routes->get('kategori/create', 'Admin/Kategori::create');
$routes->post('kategori/save', 'Admin/Kategori::save');
$routes->get('kategori/edit/(:num)', 'Admin/Kategori::edit/$1');
$routes->post('kategori/update/(:num)', 'Admin/Kategori::update/$1');
$routes->get('kategori/delete/(:num)', 'Admin/Kategori::delete/$1');

$routes->get('users', 'Admin/Users::index');
$routes->get('users/create', 'Admin/Users::create');
$routes->post('users/save', 'Admin/Users::save');
$routes->get('users/edit/(:num)', 'Admin/Users::edit/$1');
$routes->post('users/update/(:num)', 'Admin/Users::update/$1');
$routes->get('users/delete/(:num)', 'Admin/Users::delete/$1');

$routes->get('faskes', 'Admin/Faskes::index');
$routes->get('faskes/create', 'Admin/Faskes::create');
$routes->post('faskes/save', 'Admin/Faskes::save');
$routes->get('faskes/edit/(:num)', 'Admin/Faskes::edit/$1');
$routes->post('faskes/update/(:num)', 'Admin/Faskes::update/$1');
$routes->get('faskes/delete/(:num)', 'Admin/Faskes::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
