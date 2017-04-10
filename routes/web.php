<?php
// Backend
Route::resource('product', 'backend\ProductController');
Auth::routes();

Route::group(['middleware' => 'isroleadmin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'backend\adminController@dashboard');
        Route::resource('order', 'backend\OrderController');
        Route::resource('user', 'backend\UserController');
        Route::resource('categories', 'backend\CategoriesController');
        Route::resource('product', 'backend\ProductController');
        Route::resource('sale', 'backend\SaleController');
    });
});


//FRONTEND
Route::get('/', 'frontend\HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('phone', 'frontend\HomeController@index');
Route::get('frontend_categories', 'frontend\PhoneController@categories');
//categories_product
Route::get('list_categories/{alias}', ['as' => 'cateparent', 'uses' => 'frontend\PhoneController@cateparent']);
//detail_product


//using facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');


Route::get('cate', 'backend\CategoriesController@show');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// -- SearchController
Route::get('master', 'frontend\SearchController@theme');
Route::get('search', 'frontend\SearchController@search');


//introduce
Route::get('introduce','frontend\PhoneController@introduce');

//Contacts
Route::get('contact', 'frontend\PhoneController@contact');

//payController
Route::get('pay', 'frontend\PayController@pay');
Route::post('pay', ['as' => 'pay', 'uses' => 'frontend\PayController@postPay']);

Route::get('notification',['as'=>'notification','uses'=>'frontend\PayController@notification']);
//-- CartController
Route::get('cart', ['as' => 'cart', 'uses' => 'frontend\CartController@cart']);
Route::get('addtocart/{id?}', 'frontend\CartController@addtocart');
Route::get('delete_cart', 'frontend\CartController@delete_cart');
Route::get('remove_cart/{id}', ['as' => 'remove_cart', 'uses' => 'frontend\CartController@remove_cart']);

Route::get('{alias}', ['as' => 'detail', 'uses' => 'frontend\PhoneController@detail']);
