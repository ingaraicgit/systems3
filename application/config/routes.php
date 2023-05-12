	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';  
$route['default_controller'] = 'pages/view';

$route['categories'] = 'Categories/index';
$route['categories/categories_create'] = 'Categories/create';
$route['categories/posts/(:any)'] = 'Categories/posts/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

