<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


use App\Controllers\Pages;

$routes->get('pages', [Pages::class, 'index']);
$routes->group('', ['filter'=>'AuthCheck'], function($routes){
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/editGrades', 'SearchController::index');
    $routes->get('/dashboard/profile', 'Dashboard::profile');

    $routes->get('/transcript', 'Transcript::selectStudent');
    $routes->post('/transcript/showTranscript', 'Transcript::showTranscript');
    $routes->post('/transcript/search', 'Transcript::search');


    $routes->get('/addClass', 'AddClass::index');
    $routes->get('/addStudent', 'AddStudent::index');
    $routes->post('/addClass/add', 'AddClass::save');
    $routes->post('/addStudent/add', 'AddStudent::save');
    $routes->get('/assignStudents', 'AssignStudent::index');
    $routes->post('/assignClass/classSelected', 'AssignClass::index');
    $routes->post('/assignStudents/search', 'AssignStudent::search');
    $routes->post('/assignClass/classSelected/search', 'AssignClass::search');
    $routes->get('/editGrades/result/(:num)', 'GradeController::index/$1');
    $routes->get('/editGrades/result/edit/(:num)', 'GradeController::edit/$1');
    $routes->post('/editGrades/result/submit/(:num)', 'GradeController::submit/$1');
    $routes->post('/assignClass/classSelected/saveChanges', 'AssignClass::save');
    $routes->post('/editGrades/search', 'SearchController::search');
    $routes->get('auth/register', 'Auth::register');
});
$routes->group('', ['filter'=>'AlreadyLoggedIn'], function($routes){

    $routes->get('auth', 'Auth::index');
    $routes->get('/', 'Auth::index');
});
$routes->get('auth/logout', 'Auth::logout');
$routes->post('auth/check', 'Auth::check');
$routes->post('auth/save', 'Auth::save');
$routes->get('(:segment)', [Pages::class, 'view']);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

