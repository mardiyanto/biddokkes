<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Frontend::index');
//$routes->get('/', 'Auth::login'); 
$routes->get('login', 'Auth::login');
$routes->get('login/logout', 'Auth::logout');
$routes->post('login/doLogin', 'Auth::doLogin');

//admin
$routes->get('dashboard/admin', 'Dashboard::admin');
$routes->get('dashboard/user', 'Dashboard::user'); 
//user

$routes->get('user', 'User::index');
// $routes->get('user/index', 'User::index');

// Admin routes (kategori)
$routes->get('kategori', 'Kategori::index');
$routes->post('kategori/store', 'Kategori::store');
$routes->get('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('kategori/update/(:num)', 'Kategori::update/$1');
$routes->get('kategori/delete/(:num)', 'Kategori::delete/$1');

// Admin routes (berita)
$routes->get('berita', 'Berita::index');
$routes->get('berita/create', 'Berita::create');
$routes->post('berita/store', 'Berita::store');
$routes->get('berita/edit/(:num)', 'Berita::edit/$1');
$routes->post('berita/update/(:num)', 'Berita::update/$1');
$routes->get('berita/delete/(:num)', 'Berita::delete/$1');

// Admin routes (kategori download)
$routes->get('kategori-download', 'KategoriDownload::index');
$routes->get('kategori-download/create', 'KategoriDownload::create');
$routes->post('kategori-download/store', 'KategoriDownload::store');
$routes->get('kategori-download/edit/(:num)', 'KategoriDownload::edit/$1');
$routes->post('kategori-download/update/(:num)', 'KategoriDownload::update/$1');
$routes->get('kategori-download/delete/(:num)', 'KategoriDownload::delete/$1');

// Admin routes (download)
$routes->get('download', 'Download::index');
$routes->get('download/create', 'Download::create');
$routes->post('download/store', 'Download::store');
$routes->get('download/edit/(:num)', 'Download::edit/$1');
$routes->post('download/update/(:num)', 'Download::update/$1');
$routes->get('download/delete/(:num)', 'Download::delete/$1');
$routes->get('download/download/(:num)', 'Download::download/$1');

// Admin routes (halaman)
$routes->get('halaman', 'Halaman::index');
$routes->get('halaman/create', 'Halaman::create');
$routes->post('halaman/store', 'Halaman::store');
$routes->get('halaman/edit/(:num)', 'Halaman::edit/$1');
$routes->post('halaman/update/(:num)', 'Halaman::update/$1');
$routes->get('halaman/delete/(:num)', 'Halaman::delete/$1');

// Admin routes (slide)
$routes->get('slide', 'Slide::index');
$routes->get('slide/create', 'Slide::create');
$routes->post('slide/store', 'Slide::store');
$routes->get('slide/edit/(:num)', 'Slide::edit/$1');
$routes->post('slide/update/(:num)', 'Slide::update/$1');
$routes->get('slide/delete/(:num)', 'Slide::delete/$1');
$routes->get('slide/toggle-status/(:num)', 'Slide::toggleStatus/$1');

// Admin routes (user)
$routes->get('user', 'User::index');
$routes->get('user/create', 'User::create');
$routes->post('user/store', 'User::store');
$routes->get('user/edit/(:num)', 'User::edit/$1');
$routes->post('user/update/(:num)', 'User::update/$1');
$routes->get('user/delete/(:num)', 'User::delete/$1');

// User profile routes
$routes->get('user/profile', 'User::profile');
$routes->post('user/update-profile', 'User::updateProfile');
$routes->get('user/change-password', 'User::changePassword');
$routes->post('user/update-password', 'User::updatePassword');

// Admin routes (galeri)
$routes->get('galeri', 'Galeri::index');
$routes->get('galeri/create', 'Galeri::create');
$routes->post('galeri/store', 'Galeri::store');
$routes->get('galeri/edit/(:num)', 'Galeri::edit/$1');
$routes->post('galeri/update/(:num)', 'Galeri::update/$1');
$routes->get('galeri/delete/(:num)', 'Galeri::delete/$1');
$routes->get('galeri/download/(:num)', 'Galeri::download/$1');

// Admin routes (profil website)
$routes->get('profil', 'Profil::index');
$routes->post('profil/update', 'Profil::update');

// Frontend routes (dengan prefix 'front' untuk menghindari konflik)
$routes->get('frontberita', 'Frontend::berita');
$routes->get('frontberita/(:segment)', 'Frontend::beritaDetail/$1');
$routes->get('frontgaleri', 'Frontend::galeri');
$routes->get('fronthalaman/(:segment)', 'Frontend::halaman/$1');
$routes->get('frontdownload', 'Frontend::download');
$routes->get('frontdownload/file/(:num)', 'Frontend::downloadFile/$1');
$routes->get('frontcontact', 'Frontend::contact');
$routes->get('frontsearch', 'Frontend::search');

// Frontend routes (halaman statis) - legacy
$routes->get('fronthalaman/(:segment)', 'Halaman::show/$1');
// Frontend routes (galeri) - legacy
$routes->get('frontgaleri', 'Galeri::frontend');


