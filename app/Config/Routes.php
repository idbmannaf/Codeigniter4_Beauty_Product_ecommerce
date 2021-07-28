<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\CartController;

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
//$routes->get('/admin', 'Auth::index');
$routes->get('auth/login','User::index');
$routes->get('/dashboard','Dashboard::index',['filter' =>'auth']);
$routes->get('/users','Dashboard::users',['filter' =>'auth']);
$routes->get('users/view/(:num)','Dashboard::view/$1',['filter' =>'auth']);
$routes->get('users/add','Dashboard::add',['filter' =>'auth']);
$routes->get('users/edit/(:num)','Dashboard::edit/$1',['filter' =>'auth']);
$routes->get('users/delete/(:num)','Dashboard::delete/$1',['filter' =>'auth']);



$routes->get('/category','admin/Category::index',['filter' =>'auth']);
$routes->get('category/add','admin/Category::add',['filter' =>'auth']);
$routes->post('category/save','admin/Category::save',['filter' =>'auth']);
$routes->post('category/update','admin/Category::update',['filter' =>'auth']);
//$routes->get('category/edit/(:num)','admin/Category::edit/$1',['filter' =>'auth']);

$routes->get('/sub-category','SubCategory::index',['filter' =>'auth']);
$routes->get('sub-category/add','SubCategory::add',['filter' =>'auth']);
$routes->post('sub-category/ajaxrequest','SubCategory::ajaxrequest',['filter' =>'auth']);
$routes->post('sub-category/save','SubCategory::save',['filter' =>'auth']);
$routes->get('sub-category/view/(:num)','SubCategory::view/$1',['filter' =>'auth']);

$routes->get('/product','ProductController::index',['filter' =>'auth']);
$routes->get('product/add','ProductController::add',['filter' =>'auth']);
$routes->post('product/save','ProductController::save',['filter' =>'auth']);
$routes->post('product/productajax','ProductController::loadSubcatAjax',['filter' =>'auth']);
//$routes->get('product/edit/(:num)','ProductController::edit/$1',['filter' =>'auth']);
$routes->get('product/edit/delete/thumb/(:num)','ProductController::editDeleteThumb/$1',['filter' =>'auth']);
$routes->post('product/update','ProductController::update',['filter' =>'auth']);
$routes->post('product/upload/thumbnail','ProductController::uploadProductThumbnail',['filter' =>'auth']);
$routes->post('product/delete/thumbnail','ProductController::productDeleteThumbnail',['filter' =>'auth']);
$routes->get('product/delete/(:num)','ProductController::delete/$1',['filter' =>'auth']);
$routes->get('product/view/(:num)','ProductController::view/$1',['filter' =>'auth']);

$routes->get('/testimonial','TestimonialController::index',['filter' =>'auth']);


$routes->get('/coupons','CouponsController::index',['filter' =>'auth']);
$routes->get('coupons/add','CouponsController::add',['filter' =>'auth']);
$routes->post('coupons/save','CouponsController::save',['filter' =>'auth']);
$routes->get('coupons/edit/(:num)','CouponsController::edit/$1',['filter' =>'auth']);
$routes->get('coupons/delete(:num)','CouponsController::delete/$1',['filter' =>'auth']);
$routes->get('/all-order','AdminOrder::index',['filter' =>'auth']);
$routes->post('all-order/update','AdminOrder::index',['filter' =>'auth']);

$routes->get('admin/blog/add','BlogController::addBlog',['filter' =>'auth']);
$routes->post('blog/save','BlogController::save',['filter' =>'auth']);
$routes->get('blog/view','BlogController::view',['filter' =>'auth']);


//Front End Routes
$routes->get('/search','SearchController::index/$1');
$routes->get('/shop','Home::shop');
$routes->get('cat/(:num)','Home::singleCatPost/$1');
$routes->get('/catalog','FrontCategory::index/$1');
$routes->get('catalog/(:num)','FrontCategory::singlecat/$1');
$routes->get('catalog/(:num)/(:any)','FrontCategory::singlecat/$1/$2');
$routes->get('subcategory/(:num)','FrontSubcategory::index/$1'); //No
//$routes->post('/subcategory','FrontSubcategory::subcatAjax'); //No
$routes->get('single-product/(:num)','FrontProducts::index/$1'); //No
$routes->get('/wishlist','FrontProducts::wishlist',['filter' =>'customer_auth']);
$routes->get('wishlist/(:num)','FrontProducts::addWishlist/$1',['filter' =>'customer_auth']);
$routes->post('/delete-wishlist-item','FrontProducts::deleteWishlist',['filter' =>'customer_auth']);
$routes->get('/my-order','FrontProducts::myOrder',['filter' =>'customer_auth']);
$routes->post('my-order/delete','FrontProducts::deleteOrder',['filter' =>'customer_auth']);
$routes->get('home','FronendController::index'); //No
//$routes->get('/auth','Dashboard::index',['filter' =>'auth']);

$routes->post('/add-to-cart',"CartController::addtocart");
$routes->get('/cart',"CartController::cartPage");
$routes->post('/delete-from-cart',"CartController::cartDeleteAjax");
$routes->post('update/cart',"CartController::updateCart");

$routes->get('/cart/(:any)',"CartController::cartPage/$1"); //For Apply Coupons
$routes->get('/checkout',"CartController::checkout"); //For Apply Coupons

//Dropdown Country
$routes->post('/cuontry-to-state','CartController::country_to_state');
$routes->post('/state-to-city','CartController::state_to_city');
$routes->post('/order','CartController::order');
//Frontend Profile Details
$routes->get('/profile','FronendController::profile',['filter' =>'customer_auth']);
$routes->get('/edit-profile','FronendController::editProfile',['filter' =>'customer_auth']);
$routes->post('/update-profile','FronendController::editProfile',['filter' =>'customer_auth']);

$routes->post('download/invoice','PdfController::index');
$routes->post('create/invoice','PdfController::createInvoice');
//$routes->get('invoice/(:id)', 'PdfController::index/$1');

//Blog
$routes->get('/blog',"BlogController::index");
$routes->get('blog/(:num)',"BlogController::singlePost/$1");
$routes->post('/addcomment',"CommentController::addComment");

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
