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

// Admin routes - Dashboard
$route['admin'] = 'admin';

// Admin routes - Produk
$route['admin/produk'] = 'produk/admin';
$route['admin/produk/tambah'] = 'produk/tambah';
$route['admin/produk/edit/(:num)'] = 'produk/edit/$1';
$route['admin/produk/hapus/(:num)'] = 'produk/hapus/$1';

// Admin routes - Testimoni
$route['admin/testimoni'] = 'testimoni/admin';
$route['admin/testimoni/tambah'] = 'testimoni/tambah';
$route['admin/testimoni/edit/(:num)'] = 'testimoni/edit/$1';
$route['admin/testimoni/detail/(:num)'] = 'testimoni/detail/$1';
$route['admin/testimoni/hapus/(:num)'] = 'testimoni/hapus/$1';

// Admin routes - Pekerjaan
$route['admin/pekerjaan'] = 'pekerjaan/admin';
$route['admin/pekerjaan/tambah'] = 'pekerjaan/tambah';
$route['admin/pekerjaan/edit/(:num)'] = 'pekerjaan/edit/$1';
$route['admin/pekerjaan/hapus/(:num)'] = 'pekerjaan/hapus/$1';

// Admin routes - Kontak
$route['admin/kontak'] = 'kontak/admin';
$route['admin/kontak/detail/(:num)'] = 'kontak/detail/$1';
$route['admin/kontak/hapus/(:num)'] = 'kontak/hapus/$1';

// Public routes
$route['beranda'] = 'beranda';
$route['produk'] = 'beranda/produk';
$route['pekerjaan'] = 'pekerjaan';
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