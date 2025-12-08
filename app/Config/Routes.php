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

$routes->get('user', 'User::index', ['filter' => 'auth']);
$routes->get('user/create', 'User::create', ['filter' => 'auth']);
$routes->post('user/store', 'User::store', ['filter' => 'auth']);
$routes->get('user/delete/(:num)', 'User::delete/$1', ['filter' => 'auth']);
$routes->get('user/edit/(:num)', 'User::edit/$1', ['filter' => 'auth']);
$routes->post('user/update/(:num)', 'User::update/$1', ['filter' => 'auth']);

$routes->get('barang', 'BarangController::index', ['filter' => 'auth']);
$routes->get('barang/create', 'BarangController::create', ['filter' => 'auth']);
$routes->post('barang/store', 'BarangController::store', ['filter' => 'auth']);
$routes->get('barang/edit/(:num)', 'BarangController::edit/$1', ['filter' => 'auth']);
$routes->post('barang/update/(:num)', 'BarangController::update/$1', ['filter' => 'auth']);
$routes->get('barang/delete/(:num)', 'BarangController::delete/$1', ['filter' => 'auth']);

$routes->get('barang-masuk', 'BarangMasukController::index', ['filter' => 'auth']);
$routes->get('barang-masuk/create', 'BarangMasukController::create', ['filter' => 'auth']);
$routes->post('barang-masuk/store', 'BarangMasukController::store', ['filter' => 'auth']);
$routes->get('barang-masuk/delete/(:num)', 'BarangMasukController::delete/$1', ['filter' => 'auth']);

$routes->get('barang-keluar', 'BarangKeluarController::index', ['filter' => 'auth']);
$routes->get('barang-keluar/create', 'BarangKeluarController::create', ['filter' => 'auth']);
$routes->post('barang-keluar/store', 'BarangKeluarController::store', ['filter' => 'auth']);
$routes->get('barang-keluar/delete/(:num)', 'BarangKeluarController::delete/$1', ['filter' => 'auth']);

$routes->get('laporan', 'Laporan::inventory', ['filter' => 'auth']  );
$routes->get('laporan/inventaris', 'Laporan::inventaris', ['filter' => 'auth'] );
$routes->get('laporan/inventaris/pdf', 'Laporan::InventarisPDF', ['filter' => 'auth'] );
$routes->get('laporan/inventaris/excel', 'Laporan::InventarisExcel', ['filter' => 'auth'] );
$routes->get('laporan/inventoryPdf', 'Laporan::inventoryPdf');
$routes->get('laporan/inventoryExcel', 'Laporan::inventoryExcel');

$routes->get('profile', 'User::profile', ['filter' => 'auth']);
$routes->post('profile/update', 'User::updateProfile', ['filter' => 'auth']);
