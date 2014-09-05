<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['news|news/(:any)|news/archives/(:any)'] = 'contents';
$route['why-pevonia'] = 'home/why_pevonia';
// $route['home-care/(:any)'] = 'products';
// $route['professional-zone/(:any)'] = 'products';
$route['home-care|professional-zone'] = 'products';
$route['pevonia-spas|pevonia-spas/(:any)|pevonia-spas/archives/(:any)'] = 'contents';
$route['activities|activities/(:any)|activities/archives/(:any)'] = 'contents';
$route['q-and-a'] = 'qa';
$route['customer-service'] = 'customer_service';
$route['(en|th)/home'] = 'home';
$route['default_controller'] = 'intro';
$route['404_override'] = 'home/_http_404';

/* End of file routes.php */
/* Location: ./application/config/routes.php */