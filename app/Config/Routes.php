<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('UserController');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/user/register', 'UserController::register');
$routes->post('/user/store', 'UserController::store');
$routes->get('/user/login', 'UserController::login');
$routes->post('/user/check', 'UserController::check');
$routes->get('/user/logout', 'UserController::logout'); // Proses logout

$routes->get('/admin/index', 'AdminController::index');
$routes->get('/bidan/index', 'BidanController::index');
$routes->get('/apoteker/index', 'ObatController::index');


// Group routes based on authentication
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {

    // Pasien routes
    $routes->get('home', 'AdminController::home'); // Menampilkan halaman daftar pasien
    $routes->get('create', 'AdminController::create'); // Menampilkan form tambah pasien
    $routes->post('store', 'AdminController::store'); // Menyimpan data pasien baru
    $routes->get('print', 'AdminController::print');
    $routes->get('laporan', 'AdminController::report');
    $routes->get('report-pdf', 'AdminController::generatePdfReport'); //Menampilkan laporan pasien
    $routes->get('edit/(:num)', 'AdminController::edit/$1'); // Menampilkan form edit pasien dengan ID tertentu
    $routes->post('update', 'AdminController::update'); // Memperbarui data pasien (ID diambil
});

$routes->group('bidan', ['filter' => 'role:bidan'], function ($routes) {
    
    $routes->get('home', 'BidanController::home'); // Menampilkan halaman daftar riwayat
    $routes->get('create/(:num)', 'BidanController::create/$1'); // Menampilkan form tambah riwayat
    $routes->post('store', 'BidanController::store'); // Menyimpan data pemeriksaan
    $routes->get('report-pdf', 'BidanController::generatePdfReport'); //Menampilkan laporan riwayat
});

// Obat routes


$routes->group('apoteker', ['filter' => 'role:apoteker'], function ($routes) {

    $routes->get('apoteker', 'ObatController::index'); // Menampilkan halaman daftar pasien
    $routes->get('create', 'ObatController::create'); // Menampilkan form tambah pasien
    $routes->post('store', 'ObatController::store'); // Menyimpan data pasien baru
    $routes->get('edit/(:num)', 'ObatController::edit/$1', ['as' => 'obat.edit']); // Menampilkan form edit pasien dengan ID tertentu
    $routes->post('update', 'ObatController::update'); // Memperbarui data pasien (ID diambil
    $routes->get('report-pdf', 'ObatController::generatePdfReport'); //Menampilkan laporan obat

});

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'UserController::login');

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
