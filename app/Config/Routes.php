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
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');


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


// search page - no auth required
$routes->get('/venue/search', 'VenueController::search');


//grouped routes
$routes->group('', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/AdminDashboard', 'AdminDashboard::index');
    $routes->get('/AdminCreateTemplate', 'CreateTemplateController::index');
    $routes->get('/ManageTemplates', 'ManageTemplates::index');
    $routes->get('/AdminInbox', 'InboxController::adminInbox');
    $routes->get('/Settings', 'SettingsController::index');
    $routes->get('/ChangeDetails', 'SettingsController::changeDetails');
    $routes->get('/UpdatePassword', 'SettingsController::updatePassword');
    $routes->get('/ChangePicture', 'SettingsController::changePicture');
    $routes->get('/CustomerDashboard', 'CustomerDashboard::index');
    $routes->get('/CustomerNewVenue', 'CustomerDashboard::newVenue');
    $routes->get('/Checkout', 'PaymentController::checkout');
    $routes->get('/CustomerInbox', 'InboxController::customerInbox');
    $routes->get('/Audit', 'AuditController::index');

    $routes->get('/assignAudit', 'AuditController::assignAudit');
    // $routes->get('/Audit/auditResults', 'AuditController::auditResults');
    $routes->get('success', 'PaymentController::success');
    $routes->get('showTransactions', 'PaymentController::showTransactions');
    $routes->get('/Products', 'PaymentController::balanceManagement');
    $routes->get('/Audit/auditResults/(:num)', 'AuditController::auditResults/$1');
    $routes->get('/AuditController/OpenAudit/(:num)', 'AuditController::openAudit/$1');
    $routes->get('/openAudit/(:num)', 'AuditController::openAudit/$1');
    $routes->post('/Audit/completeAudit', 'AuditController::completeAudit');
    $routes->get('/ViewAudits', 'ViewAuditController::index');
    $routes->get('/Review', 'ReviewController::index');


    $routes->get('/ManageProducts', 'ProductManagement::index');
    $routes->get('/ManageProducts/activate/(:num)', 'ProductManagement::activate/$1');
    $routes->get('/ManageProducts/deactivate/(:num)', 'ProductManagement::deactivate/$1');
    $routes->get('/ManageProducts/addPromoCode/', 'ProductManagement::addPromoCode');
});

$routes->get('/Home', 'Home::index');
$routes->get('/HomeViewVenue/(:num)', 'Home::viewVenueDetails/$1');
$routes->get('/Login', 'LoginController::index');
$routes->get('/Register', 'RegisterController::index');
$routes->get('/RegisterSuccess', 'RegisterSuccessController::index');
$routes->get('/ForgotPasswordSuccess', 'LoginController::forgotPasswordSuccess');
$routes->get('/QR', 'QRController::index');
$routes->get('/FAQ', 'FAQController::index');
$routes->get('/Affiliates', 'AffiliateController::index');
$routes->get('/ForgotPassword', 'LoginController::forgotPassword');
$routes->get('/UpdatePasswordHash', 'LoginController::updatePasswordHash');
$routes->get('/AuditReportView/(:num)', 'ReportController::viewAuditReport/$1');

// api routes
$routes->group('', ['filter' => 'cors'], function ($routes) {
    $routes->get('/embedApi', 'Api::index');
    $routes->get('/embedScript', 'Api::serveEmbedScript');
    $routes->options('/embedApi', 'Api::options');
});





// $routes->get('/Home', 'Home::index', ['filter' => 'authGuard']);
// $routes->get('/AdminDashboard', 'AdminDashboard::index');
// $routes->get('/AdminCreateTemplate', 'CreateTemplateController::index');
// $routes->get('/AdminDeleteTemplate', 'DeleteTemplateController::index');
// $routes->get('/AdminInbox', 'InboxController::adminInbox');
// $routes->get('/AdminSettings', 'AdminSettingsController::index');
// $routes->get('/AdminChangeDetails', 'AdminSettingsController::changeDetails');
// $routes->get('/AdminUpdatePassword', 'AdminSettingsController::updatePassword');
// $routes->get('/AdminChangePicture', 'AdminSettingsController::changePicture');
// $routes->get('/CustomerDashboard', 'CustomerDashboard::index');
// $routes->get('/CustomerNewVenue', 'CustomerDashboard::newVenue');
// $routes->get('/CustomerInbox', 'InboxController::customerInbox');
// $routes->get('/Audit', 'AuditController::index', ['filter' => 'authGuard']);
// $routes->get('/Login', 'LoginController::index');
// $routes->get('/Register', 'RegisterController::index');
// $routes->get('/RegisterSuccess', 'RegisterSuccessController::index');
// $routes->get('/QR', 'QRController::index');
// $routes->get('/FAQ', 'FAQController::index');
// $routes->get('/ViewAudits', 'ViewAuditController::index');
// $routes->get('/ForgotPassword', 'LoginController::ForgotPassword');

// $routes->get('/Audit/auditResults', 'AuditController::auditResults');
// $routes->post('/Audit/completeAudit', 'AuditController::completeAudit');
