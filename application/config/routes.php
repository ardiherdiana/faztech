<?php
// application/config/routes.php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

$route['default_controller'] = 'beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| SPECIFIC ROUTES FIRST (lebih spesifik di atas)
| -------------------------------------------------------------------------
*/

// Auth routes
$route['masuk'] = 'auth/masuk';
$route['daftar'] = 'auth/daftar';
$route['keluar'] = 'auth/keluar';

// Landing page routes
$route['beranda/cari_produk'] = 'beranda/cari_produk';
$route['beranda/detail_produk/(:num)'] = 'beranda/detail_produk/$1';
$route['beranda/whatsapp_link'] = 'beranda/whatsapp_link';

// CRUD Produk routes (spesifik dulu)
$route['admin/produk'] = 'produk';
$route['admin/produk/tambah'] = 'produk/tambah';
$route['admin/produk/edit/(:num)'] = 'produk/edit/$1';
$route['admin/produk/hapus/(:num)'] = 'produk/hapus/$1';

// CRUD Testimoni routes (spesifik dulu)
$route['testimoni/tambah'] = 'testimoni/tambah';
$route['testimoni/edit/(:num)'] = 'testimoni/edit/$1';
$route['testimoni/detail/(:num)'] = 'testimoni/detail/$1';
$route['testimoni/hapus/(:num)'] = 'testimoni/hapus/$1';

// CRUD Kontak routes (spesifik dulu)
$route['kontak/detail/(:num)'] = 'kontak/detail/$1';
$route['kontak/hapus/(:num)'] = 'kontak/hapus/$1';

// General routes (yang lebih umum di bawah)
$route['beranda'] = 'beranda';
$route['admin'] = 'admin';
$route['produk'] = 'beranda/produk';
$route['testimoni'] = 'testimoni';
$route['kontak'] = 'kontak';

/*
| -------------------------------------------------------------------------
| ALTERNATIVE ROUTES (jika yang atas tidak bekerja)
| -------------------------------------------------------------------------
*/

// Jika masih 404, coba uncomment ini:
// $route['admin/produk'] = 'produk';
// $route['admin/testimoni'] = 'testimoni';