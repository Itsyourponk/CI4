<?php

use App\Controllers\Pegawai;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/','Pegawai::index');
$routes->post('/pegawai/simpan', 'Pegawai::simpan');
$routes->setAutoRoute(true);
$routes->get('/pegawai/edit/(:num)', 'Pegawai::edit/$1');
$routes->get('/pegawai/hapus/(:num)', 'Pegawai::hapus/$1');