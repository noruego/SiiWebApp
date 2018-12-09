<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','LoginController@index');
Route::post('/', ['as' => '/', 'uses'=>'LoginController@login']);
Route::get('/logout', ['as' => '/logout', 'uses'=>'LoginController@logout']);
//rutas para los cupones


Route::resource('/discount_cupon','DiscountCuponController') ;
Route::get('/discount_cupon/delete/{id}', ['as' => '/discount_cupon/delete', 'uses'=>'DiscountCuponController@delete']);
Route::post('/discount_cupon/search', ['as' => '/discount_cupon/search', 'uses'=>'DiscountCuponController@search']);

/*Resouces for student controller*/
Route::resource('/student','StudentController') ;
Route::get('/student/delete/{id}', ['as' => '/student/delete', 'uses'=>'StudentController@delete']);
Route::post('/student/search', ['as' => '/student/search', 'uses'=>'StudentController@search']);

/*Resouces for matter controller*/
Route::resource('/matter','matterController') ;
Route::get('/matter/delete/{id}', ['as' => '/matter/delete', 'uses'=>'matterController@delete']);
Route::post('/matter/search', ['as' => '/matter/search', 'uses'=>'matterController@search']);

/*Resouces for matter controller*/
Route::resource('/oportunity','OportunityController') ;
Route::get('/oportunity/delete/{id}', ['as' => '/oportunity/delete', 'uses'=>'OportunityController@delete']);
Route::post('/oportunity/search', ['as' => '/oportunity/search', 'uses'=>'OportunityController@search']);

/*Resources fro career controller*/
Route::resource('/career','CareerController') ;
Route::get('/career/delete/{id}', ['as' => '/career/delete', 'uses'=>'CareerController@delete']);
Route::post('/career/search', ['as' => '/career/search', 'uses'=>'CareerController@search']);

/*Resources fro career controller*/
Route::resource('/teacher','TeacherController') ;
Route::get('/teacher/delete/{id}', ['as' => '/teacher/delete', 'uses'=>'TeacherController@delete']);
Route::post('/teacher/search', ['as' => '/teacher/search', 'uses'=>'TeacherController@search']);

/*Resources fro groups controller*/
Route::resource('/groups','GroupsController') ;
Route::get('/groups/delete/{id}', ['as' => '/groups/delete', 'uses'=>'GroupsController@delete']);
Route::post('/groups/search', ['as' => '/groups/search', 'uses'=>'GroupsController@search']);

//rutas para el metodo
Route::resource('/payment_method','PaymentMethodController') ;
Route::get('/payment_method/delete/{id}', ['as' => '/payment_method/delete', 'uses'=>'PaymentMethodController@delete']);
Route::post('/payment_method/search', ['as' => '/payment_method/search', 'uses'=>'PaymentMethodController@search']);
//rutas de categoria
Route::resource('/category','CategoryController') ;
Route::get('/category/delete/{id}', ['as' => '/category/delete', 'uses'=>'CategoryController@delete']);
Route::post('/category/search', ['as' => '/category/search', 'uses'=>'CategoryController@search']);
//rutas para el provedor
Route::resource('/provider','ProviderController') ;
Route::get('/provider/delete/{id}', ['as' => '/provider/delete', 'uses'=>'ProviderController@delete']);
Route::post('/provider/search', ['as' => '/provider/search', 'uses'=>'ProviderController@search']);
Route::get('/state/{id}','ProviderController@city');
//rutas para el producto
Route::resource('/product','ProductController') ;
Route::get('/product/delete/{id}', ['as' => '/product/delete', 'uses'=>'ProductController@delete']);
Route::post('/product/search', ['as' => '/product/search', 'uses'=>'ProductController@search']);
//rutas para las ordenes de producto
Route::resource('/product_order','ProductOrderController') ;
Route::get('/product_order/delete/{id}', ['as' => '/product_order/delete', 'uses'=>'ProductOrderController@delete']);
Route::get('/product_order/detail/{id}', ['as' => '/product_order/detail', 'uses'=>'ProductOrderController@detail']);
Route::post('/product_order/search', ['as' => '/product_order/search', 'uses'=>'ProductOrderController@search']);
//rutas par usuario
Route::resource('/user','UserController') ;
Route::get('/user/delete/{id}', ['as' => '/user/delete', 'uses'=>'UserController@delete']);
Route::post('/user/search', ['as' => '/user/search', 'uses'=>'UserController@search']);
//rutas del api de cupon
Route::get('/api/cupon', 'ApiCuponController@index');
Route::get('/api/cupon/{id}', 'ApiCuponController@show');
Route::post('/api/cupon', 'ApiCuponController@store');
Route::put('/api/cupon/{id}', 'ApiCuponController@update');
Route::delete('/api/cupon/{id}', 'ApiCuponController@delete');


Route::resource('/report_products','ReportProductController');
Route::get('/report_products/search/{id}', ['as' => '/report_products/search', 'uses'=>'ReportProductController@search']);
Route::get('/report_products/search_pdf/{id}', ['as' => '/report_products/search_pdf', 'uses'=>'ReportProductController@search_pdf']);
Route::get('/report_products/show', ['as' => '/report_products/show', 'uses'=>'ReportProductController@show']);
Route::get('/report_products/show_pdf', ['as' => '/report_products/show_pdf', 'uses'=>'ReportProductController@show_pdf']);
Route::get('/report_orders', ['as' => '/report_orders', 'uses'=>'ReportProductController@orders']);
Route::post('/report_orders/search', ['as' => '/report_orders/search', 'uses'=>'ReportProductController@orders_search']);
Route::get('/report_graphics', ['as' => '/report_graphics', 'uses'=>'ReportProductController@graphics']);

/**
 * Routes for Api
 */

/**
 * Routes for seccion ctaegory
 */
Route::resource('api/categories','ApiCategoryController',
    ['only' => ['index','show','store','easyUpdate','delete']]);

Route::resource('api/user','ApiUsersController',
    ['only' => ['index','show','store','easyUpdate','delete']]);

/**
 * Routes for seccion product
 */
Route::resource('api/products','ApiProductController',
    ['only' => ['index','show','store','update','destroy']]);
/**
 * Route for seccion provider
 */
Route::resource('api/provider','ApiProviderController',
    ['only' => ['index','show','store','update','destroy']]);
/**
 * Routes for bill's
 */
Route::resource('api/bill', 'ApiBillController',
    ['only' => ['index','show','strore','update','destroy']]);
/*
 * Route for ship's
 */
Route::resource('api/ship','ApiShipController',
    ['only' => ['index','show','update','store','destroy']]);
/*
 * Route for order's
 */
Route::resource('api/order','ApiOrdersController',
    ['only' => ['index','show','update','store','destroy']]);
Route::post('api/order/add', 'ApiOrdersController@add');
Route::resource('api/order_detail','ApiOrdersDetailController',
    ['only' => ['index','show','update','store','destroy']]);
/**
 * Routes for City
 */
Route::resource('api/city','ApiCityController',
    ['only' => ['index','show']]);

/**
 * Routes for state's
 */
Route::resource('api/state','ApiStateController',
    ['only' => ['show','index']]);

/**
 * Routes for payment_method
 */
Route::resource('api/payment','ApiPaymentController',
    ['only' => ['index','show']]);

