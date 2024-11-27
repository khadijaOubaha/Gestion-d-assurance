<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//  $routes->get('/', 'hController::addClient');

$routes->get('/login_client','ClientController::loginPage');
$routes->get('/fill-clients', 'ClientController::fillTable');
$routes->post('/login/validate', 'ClientController::validateLogin'); // Valider la connexion
$routes->get('/logout', 'ClientController::logout'); 
// $routes->get('/login_admin', 'AdminController::loginPage');
// $routes->post('/login/validate/admin', 'AdminController::loginAdmin'); // Valider la
$routes->get('profil', 'ClientController::profile');
// $routes->get('auto', 'ClientController::auto');
 $routes->get('/client/rendezvous', 'RendezvousController::list');
$routes->get('/rendezvous/create', 'RendezvousController::create'); // Page pour prendre un rendez-vous
$routes->post('/rendezvous/store', 'RendezvousController::store'); 
$routes->get('/rendezvous/delete/(:num)', 'RendezvousController::delete/$1');


$routes->get('/modifier/profil', 'ClientController::modifierProfil'); // Page pour prendre un rendez-vous
$routes->post('/profil/store', 'ClientController::modifierProfilEtVoiture'); 

// form/submit

// $routes->get('/admin/rendezvous', 'RendezvousController::list');
// $routes->get('/admin/rendezvous/validate/(:num)', 'RendezvousController::updateStatus/$1/validé');
// $routes->get('/admin/rendezvous/reject/(:num)', 'RendezvousController::updateStatus/$1/rejeté');

// $routes->get('/admin/login', 'AdminController::login');
// $routes->post('/admin/loginProcess', 'AdminController::loginProcess');
// $routes->get('/admin/dashboard', 'AdminController::dashboard');
// $routes->get('/admin/logout', 'AdminController::logout');
// $routes->get('/admin/addUser', 'AdminController::addUser');
// $routes->post('/admin/saveUser', 'AdminController::saveUser');
// $routes->get('/admin/usersTable', 'AdminController::usersTable');
// $routes->get('/admin/editUser/(:num)', 'AdminController::editUser/$1'); // Route pour modifier
// $routes->get('/admin/deleteUser/(:num)', 'AdminController::deleteUser/$1'); // Route pour supprimer
// $routes->get('/admin/warnUser/(:num)', 'AdminController::warnUser/$1'); // Route pour avertir

$routes->get('/admin/login', 'AdminController::login');
$routes->post('/admin/loginProcess', 'AdminController::loginProcess');
$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/logout', 'AdminController::logout');
$routes->get('/admin/addUser', 'AdminController::addUser');
$routes->post('/admin/saveUser', 'AdminController::saveUser');
$routes->get('/admin/usersTable', 'AdminController::usersTable');
$routes->get('/admin/editUser/(:num)', 'AdminController::editUser/$1'); // Route pour modifier
$routes->get('/admin/deleteUser/(:num)', 'AdminController::deleteUser/$1'); // Route pour supprimer
$routes->get('/admin/warnUser/(:num)', 'AdminController::warnUser/$1'); // Route pour avertir
$routes->get('/notifications/getNotifications', 'NotificationController::getNotifications');
$routes->post('/feedback/submit', 'FeedbackController::submit');
$routes->get('/admin/feedbacks', 'AdminController::viewFeedbacks');
$routes->post('/send-feedback', 'FeedbackController::sendFeedback');

$routes->get('/Auto/info', 'AdminController::hm');
// app/Config/Routes.php
// $routes->get('/admin/notifications', 'AdminController::notifications');
$routes->get('admin/notifications', 'AdminController::notifications');
// $routes->get('admin/notifications/mark-seen/(:num)', 'AdminController::markAsSeen/$1'); // Pour un rendez-vous spécifique
// $routes->get('admin/notifications/mark-seen', 'AdminController::markAsSeen'); // Pour tous les rendez-vous
// $routes->get('rendezvous/update/(:num)/(:alpha)', 'RendezvousController::updateStatus/$1/$2');
$routes->get('admin/rendezvous/valider/(:num)', 'RendezvousController::valider/$1');
$routes->get('admin/rendezvous/rejeter/(:num)', 'RendezvousController::rejeter/$1');
$routes->get('admin/notifications/mark-seen/(:num)', 'RendezvousController::markSeen/$1');

