<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['report'] = 'report/index';
$route['report/add'] = 'report/add';
$route['report/search'] = 'report/search';


$route['notes'] = 'notes/index';
$route['notes/create'] = 'notes/create';
$route['notes/share/(:num)'] = 'notes/share/$1';
$route['notes/stop_sharing/(:num)'] = 'notes/stop_sharing/$1';


// $route['notes'] = 'notes/index';
// $route['notes/add'] = 'notes/add';
// $route['notes/share'] = 'notes/share';
// $route['notes/stop_sharing'] = 'notes/stop_sharing';


// $route['notes'] = 'notes/index';
// $route['notes/add'] = 'notes/add';
// $route['notes/share'] = 'notes/share';
// $route['notes/stop_sharing/(:num)'] = 'notes/stop_sharing/$1';

$route['notice/all'] = 'notice/All_notice';
$route['notice/add'] = 'notice/Add_notice';
$route['notice/publish'] = 'notice/Published_Notice';


$route['rapport'] = 'rapport/index';
$route['rapport/employee_rapports'] = 'rapport/employee_rapports';
$route['rapport/add_rapport'] = 'rapport/add_rapport';



