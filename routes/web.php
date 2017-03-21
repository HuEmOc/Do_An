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



Route::get('/', function () {
    return view('welcome');
});

/*Route::get('hi', function () {
    return view('frontend.default');
});
*/


                        //BACKEND

Route::resource('product','backend\ProductController');

//Route::resource('shop', 'frontend\FrontendController');

Auth::routes();
Route::get('/home', 'HomeController@index');

//backend
Route::group(['middleware'=>'isroleadmin'],function (){
    Route::resource('admin','backend\UserController');
    Route::resource('categories','backend\CategoriesController');
    Route::resource('product','backend\ProductController');
});

                            //FRONTEND
// --HomeController
//home
Route::get('phone','frontend\HomeController@index');



Route::get('frontend_categories','frontend\PhoneController@categories');
//categories_product
Route::get('list_categories/{alias}',['as' => 'cateparent','uses' => 'frontend\PhoneController@cateparent']);
//detail_product



//using facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');


Route::get('cate','backend\CategoriesController@show');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// -- SearchController
Route::get('home','frontend\SearchController@theme');
Route::get('search','frontend\SearchController@search');


//Contacts
Route::get('contact','frontend\PhoneController@contact');

//-- CartController
Route::get('cart',['as' =>'cart', 'uses' =>'frontend\CartController@cart']);
Route::get('addtocart/{id?}','frontend\CartController@addtocart');
Route::get('delete_cart','frontend\CartController@delete_cart');
Route::get('remove_cart/{id}',['as' => 'remove_cart','uses' => 'frontend\CartController@remove_cart']);
//pay


Route::get('{alias}',['as'=> 'detail','uses'=>'frontend\PhoneController@detail']);

Route::get('pay','frontend\PhoneController@pay');

Route::get('rate/{id}','frontend\PhoneController@rate');
Route::get('sale','frontend\PhoneController@sale');
