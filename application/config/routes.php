<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['(en|th)/home'] = 'home';
$route['(en|th)/(news|news/(:any)|news/archives/(:any))'] = 'contents';
$route['(en|th)/why-pevonia'] = 'home/why_pevonia';
$route['(en|th)/(HomeCare|HomeCare/(:any)|HomeCare/(:any)/(:any))'] = 'products';
$route['(en|th)/(professional-zone|professional-zone/(:any)|professional-zone/(:any)/(:any))'] = 'products';
$route['(en|th)/(pevonia-spas|pevonia-spas/(:any)|pevonia-spas/archives/(:any))'] = 'contents';
$route['(en|th)/(activities|activities/(:any)|activities/archives/(:any))'] = 'contents';
$route['(en|th)/(q-and-a|q-and-a/archives/(:any))'] = 'qa';
$route['(en|th)/customer-service'] = 'customer_service';
$route['backend'] = 'backend/dashboard';
$route['default_controller'] = 'home';
$route['404_override'] = 'home/_http_404';

/* End of file routes.php */
/* Location: ./application/config/routes.php */