<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->resource('bukumenu', ['controller'=>'BukuMenuController']);
// $routes->get('bukumenu', 'BukuMenuController::index');
// $routes->get('bukumenu/(:num)', 'BukuMenuController::show/$1');
// $routes->post('bukumenu', 'BukuMenuController::create');
// $routes->put('bukumenu/(:num)', 'BukuMenuController::update/$1');
// $routes->delete('bukumenu/(:num)', 'BukuMenuController::delete/$1');

$routes->resource('menumakanan', ['controller'=>'MakananController']);
$routes->post('menumakanan/ubah/(:num)', 'MakananController::update/$1');
$routes->delete('menumakanan/(:num)', 'MakananController::delete/$1');

$routes->resource('menumakananpembuka', ['controller'=>'MakananPembukaController']);
$routes->post('menumakananpembuka/ubah/(:num)', 'MakananPembukaController::update/$1');
$routes->delete('menumakananpembuka/(:num)', 'MakananPembukaController::delete/$1');


$routes->resource('menumakananutama', ['controller'=>'MakananUtamaController']);
$routes->post('menumakananutama/ubah/(:num)', 'MakananUtamaController::update/$1');
$routes->delete('menumakananutama/(:num)', 'MakananUtamaController::delete/$1');


$routes->resource('menuminuman', ['controller'=>'MinumanController']);
$routes->post('menuminuman/ubah/(:num)', 'MinumanController::update/$1');
$routes->delete('menuminuman/(:num)', 'MinumanController::delete/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
