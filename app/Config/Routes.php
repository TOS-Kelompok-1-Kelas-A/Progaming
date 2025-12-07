<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Login::doLogin');
$routes->get('/logout', 'Login::logout');

$routes->get('dashboard/admin', 'Dashboard::admin', ['filter' => 'auth']);
$routes->get('dashboard/staf', 'Dashboard::staf', ['filter' => 'auth']);

$routes->get('user', 'User::index');
$routes->get('user/create', 'User::create');
$routes->post('user/store', 'User::store');
$routes->get('user/delete/(:num)', 'User::delete/$1');
$routes->get('user/edit/(:num)', 'User::edit/$1');
$routes->post('user/update/(:num)', 'User::update/$1');

$routes->get('barang', 'BarangController::index');
$routes->get('barang/create', 'BarangController::create');
$routes->post('barang/store', 'BarangController::store');
$routes->get('barang/edit/(:num)', 'BarangController::edit/$1');
$routes->post('barang/update/(:num)', 'BarangController::update/$1');
$routes->get('barang/delete/(:num)', 'BarangController::delete/$1');

$routes->get('barang-masuk', 'BarangMasukController::index');
$routes->get('barang-masuk/create', 'BarangMasukController::create');
$routes->post('barang-masuk/store', 'BarangMasukController::store');
$routes->get('barang-masuk/delete/(:num)', 'BarangMasukController::delete/$1');

$routes->get('barang-keluar', 'BarangKeluarController::index');
$routes->get('barang-keluar/create', 'BarangKeluarController::create');
$routes->post('barang-keluar/store', 'BarangKeluarController::store');
$routes->get('barang-keluar/delete/(:num)', 'BarangKeluarController::delete/$1');

$routes->get('laporan', 'Laporan::inventory');
$routes->get('laporan/inventaris', 'Laporan::inventaris');
$routes->get('laporan/inventaris/pdf', 'Laporan::InventarisPDF');
$routes->get('laporan/inventaris/excel', 'Laporan::InventarisExcel');
$routes->get('laporan/inventoryPdf', 'Laporan::inventoryPdf');
$routes->get('laporan/inventoryExcel', 'Laporan::inventoryExcel');

$routes->get('profile', 'User::profile');
$routes->post('profile/update', 'User::updateProfile');
