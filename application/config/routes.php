
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
|	$route['default_controller'] = 'Admincontroller';
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
$route['default_controller'] = 'dashboard';
$route['category_add'] = 'Admincontroller/category_add';
$route['view_Category'] = 'Admincontroller/view_Category';
$route['add_subcategory'] = 'Admincontroller/add_subcategory';
$route['view_subcategory'] = 'Admincontroller/view_subcategory';
$route['add_subchield'] = 'Admincontroller/add_subchield';
$route['view_subchild'] = 'Admincontroller/view_subchild';
$route['top_banner'] = 'Admincontroller/top_banner';
$route['view_top_banner'] = 'Admincontroller/view_top_banner';
$route['bottom_banner'] = 'Admincontroller/bottom_banner';
$route['view_bottom_banner'] = 'Admincontroller/view_bottom_banner';
$route['brand'] = 'Admincontroller/brand';
$route['view_brand'] = 'Admincontroller/view_brand';
$route['color'] = 'Admincontroller/color';
$route['view_color'] = 'Admincontroller/view_color';
$route['product'] = 'Admincontroller/product';
$route['view_product'] = 'Admincontroller/view_product';
$route['promo'] = 'Admincontroller/promo';
$route['view_promo'] = 'Admincontroller/view_promo';
$route['cart_data'] = 'Admincontroller/cart_data';
$route['categoryaction'] = 'Admincontroller/categoryaction';
$route['coloraddaction'] = 'Admincontroller/coloraddaction';
$route['productaction'] = 'Admincontroller/productaction';
$route['promoaction'] = 'Admincontroller/promoaction';
$route['subcategoryaction'] = 'Admincontroller/subcategoryaction';
$route['subchildaction'] = 'Admincontroller/subchildaction';
$route['bottombanneraction'] = 'Admincontroller/bottombanneraction';
$route['topbanneraction'] = 'Admincontroller/topbanneraction';
$route['edit_brand/(:num)'] = "Admincontroller/edit_brand/$1";
$route['edit_cate/(:num)'] = "Admincontroller/edit_cate/$1";
$route['edit_product/(:num)'] = "Admincontroller/edit_product/$1";
$route['edit_color/(:num)'] = "Admincontroller/edit_color/$1";
$route['edit_promo/(:num)'] = "Admincontroller/edit_promo/$1";
$route['edit_subcate/(:num)'] = "Admincontroller/edit_subcate/$1";
$route['edit_subchild/(:num)'] = "Admincontroller/edit_subchild/$1";
$route['edit_top/(:num)'] = "Admincontroller/edit_top/$1";
$route['single/(:num)'] = "Dashboard/sproduct/$1";
$route['get-product/([a-z]+)/(\d+)'] = "Dashboard/product/$1/id_$2";
$route['ptype/(:any)'] = 'Dashboard/type_product/$1';
$route['edit_bottom/(:num)'] = "Admincontroller/edit_bottom/$1";
$route['register'] = 'Dashboard/register';
$route['procress'] = 'Dashboard/registerprocess';
$route['cart-item'] = 'Dashboard/carts';
$route['wishlist'] = 'Dashboard/wishlist';
$route['login-user'] = 'Login/user_login';
$route['logout'] = 'Login/userlogout';
$route['checkout'] = 'Dashboard/checkout';
$route['profile'] = 'Dashboard/profile';
$route['thanku'] = 'Dashboard/transction';
$route['orders'] = 'Dashboard/myorders';
$route['about'] = 'Dashboard/about';
$route['contact'] = 'Dashboard/contact';
$route['faq'] = 'Dashboard/faq';
$route['myproduct/(:num)'] = 'Dashboard/myproduct/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
