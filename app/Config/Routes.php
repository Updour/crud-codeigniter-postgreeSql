<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// app/Config/Routes.php

$routes->get('users', 'Users::index');       // Menampilkan semua pengguna
$routes->get('users/create', 'Users::create');   // Menampilkan form tambah pengguna
$routes->post('users/store', 'Users::store');    // Menyimpan data pengguna baru
$routes->get('users/edit/(:num)', 'Users::edit/$1');   // Menampilkan form edit pengguna berdasarkan ID
$routes->post('users/update', 'Users::update');   // Menyimpan perubahan data pengguna
$routes->get('users/delete/(:num)', 'Users::delete/$1'); // Menghapus pengguna berdasarkan ID
$routes->get('users/process_inserts', 'Users::process_inserts');
