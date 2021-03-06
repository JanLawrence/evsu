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
$route['default_controller'] = 'welcome/index';
$route['home/(:any)'] = 'home/index/$1';
$route['register/(:any)/(:any)'] = 'register/index/$1/$2';
$route['account/(:any)/(:any)'] = 'account/index/$1/$2';
$route['teachers/(:any)'] = 'teachers/index/$1/';
$route['teachers/(:any)/(:any)'] = 'teachers/index/$1/$2';
$route['students/(:any)'] = 'students/index/$1/';
$route['students/(:any)/(:any)'] = 'students/index/$1/$2';
$route['grades/(:any)'] = 'grades/index/$1/';
$route['grades/(:any)/(:any)'] = 'grades/index/$1/$2';
$route['announcements/(:any)'] = 'announcements/index/$1/';
$route['announcements/(:any)/(:any)'] = 'announcements/index/$1/$2';
$route['feedbacks/(:any)'] = 'feedbacks/index/$1/';
$route['feedbacks/(:any)/(:any)'] = 'feedbacks/index/$1/$2';
$route['subjects/(:any)'] = 'subjects/index/$1/';
$route['subjects/(:any)/(:any)'] = 'subjects/index/$1/$2';
$route['section/(:any)'] = 'section/index/$1/';
$route['section/(:any)/(:any)'] = 'section/index/$1/$2';
$route['school_year/(:any)'] = 'school_year/index/$1/';
$route['school_year/(:any)/(:any)'] = 'school_year/index/$1/$2';
$route['users/(:any)'] = 'users/index/$1/';
$route['users/(:any)/(:any)'] = 'users/index/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
