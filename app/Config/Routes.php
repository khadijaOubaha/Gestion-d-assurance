<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/login_client','ClientController::loginPage');
$routes->get('/fill-clients', 'ClientController::fillTable');
$routes->post('/login_client', 'ClientController::validateLogin');
$routes->get('/logout', 'ClientController::logout'); 
$routes->get('/client/rendezvous', 'RendezvousController::list');
$routes->get('/rendezvous/create', 'RendezvousController::create'); // Page pour prendre un rendez-vous
$routes->post('/rendezvous/store', 'RendezvousController::store'); 
$routes->get('/rendezvous/delete/(:num)', 'RendezvousController::delete/$1');


$routes->get('/admin/login', 'AdminController::login');
$routes->post('/admin/loginProcess', 'AdminController::loginProcess');
$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/logout', 'AdminController::logout');
$routes->get('/admin/addUser', 'AdminController::addUser');
$routes->post('/admin/saveUserWithCar', 'hController::hhh');
$routes->get('/admin/usersTable', 'AdminController::usersTable');
$routes->get('/admin/editUser/(:num)', 'AdminController::editUser/$1'); // Route pour modifier
$routes->get('/admin/deleteUser/(:num)', 'AdminController::deleteUser/$1'); // Route pour supprimer
$routes->get('/admin/warnUser/(:num)', 'AdminController::warnUser/$1'); // Route pour avertir
$routes->get('/notifications/getNotifications', 'NotificationController::getNotifications');
$routes->post('/feedback/submit', 'FeedbackController::submit');
$routes->get('/admin/feedbacks', 'AdminController::viewFeedbacks');
$routes->post('/send-feedback', 'FeedbackController::sendFeedback');
$routes->get('/Auto/info', 'AdminController::hm');
$routes->get('admin/notifications', 'AdminController::notifications');
$routes->get('admin/rendezvous/valider/(:num)', 'RendezvousController::valider/$1');
$routes->get('admin/rendezvous/rejeter/(:num)', 'RendezvousController::rejeter/$1');
$routes->get('admin/notifications/mark-seen/(:num)', 'RendezvousController::markSeen/$1');
$routes->get('uploads/pdfs/(:any)', function($fileName) {
    return redirect()->to(WRITEPATH . 'uploads/pdfs/' . $fileName);
});
$routes->get('/profil', 'ClientController::profile');
