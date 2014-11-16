<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['(en|th)/home'] = 'home';
$route['(en|th)/(news|news/(:any))'] = 'news';
$route['(en|th)/why-pevonia'] = 'why_pevonia';
$route['(en|th)/(HomeCare|professional-zone)'] = 'products';
$route['(en|th)/(HomeCare|professional-zone)/(:any)'] = 'products';
$route['(en|th)/(pevonia-spas|pevonia-spas/(:any))'] = 'pevonia_spas';
$route['(en|th)/(activities|activities/(:any))'] = 'activities';
$route['(en|th)/(q-and-a|q-and-a/(:any))'] = 'qa';
$route['(en|th)/customer-service'] = 'customer_service';
$route['(en|th)/search'] = 'search';
$route['backend'] = 'backend/dashboard';
$route['default_controller'] = 'home';
$route['404_override'] = 'home/_http_404';

/* End of file routes.php */
/* Location: ./application/config/routes.php */