<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman Utama
$routes->get('/', 'Home::index');

// Halaman CV Sections
$routes->get('pendidikan', 'Home::pendidikan');
$routes->get('pengalaman', 'Home::pengalaman');
$routes->get('keahlian', 'Home::keahlian');
$routes->get('portofolio', 'Home::portofolio');