<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'sponsors/create', 'Sponsors::create');
$routes->match(['get', 'post'], 'galery/upload', 'Galery::upload');
$routes->get('sponsors/(:segment)', 'Sponsors::index');
$routes->get('sponsors', 'Sponsors::index');
$routes->get('upload/(:segment)', 'Upload::index');
$routes->get('upload', 'Upload::index');
$routes->get('galery/(:segment)', 'Galery::index');
$routes->get('galery', 'Galery::index');
$routes->get('credentials/(:segment)', 'Credentials::index');
$routes->get('credentials', 'Credentials::index');
$routes->get('mystory/(:segment)', 'MyStory::index');
$routes->get('mystory', 'MyStory::index');
$routes->get('sport/(:segment)', 'SportStory::index');
$routes->get('sport', 'SportStory::index');
$routes->get('contact', 'Contact::index');
$routes->get('contact/(:segment)', 'Contact::index');
$routes->get('login/(:segment)', 'Login::index');
$routes->get('login', 'Login::index');
$routes->get('logout/(:segment)', 'Logout::index');
$routes->get('logout', 'Logout::index');
$routes->get('(:any)', 'Home::index');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
