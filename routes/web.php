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




Route::resource('product','backend\ProductController');

//Route::resource('shop', 'frontend\FrontendController');

Auth::routes();
Route::get('/home', 'HomeController@index');

//backend
Route::group(['middleware'=>'isroleadmin'],function (){
    Route::resource('admin','backend\UserController');
    Route::resource('categories','backend\CategoriesController');
});

// trang chu
Route::get('phone','frontend\PhoneController@index');

//chi tiet san pham
Route::get('detail','frontend\PhoneController@detail');
//gio hang
Route::get('cart',['as' =>'cart', 'uses' =>'frontend\PhoneController@cart']);
//test
Route::get('test','frontend\PhoneController@demo');
//using facebook
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');


Route::get('cate','backend\CategoriesController@show');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//Search
Route::get('home','frontend\PhoneController@theme');
Route::get('search','frontend\PhoneController@search');

Route::get('addtocart/{id?}','frontend\PhoneController@addtocart');
Route::get('delete_cart','frontend\PhoneController@delete_cart');
Route::get('remove_cart/{id}',['as' => 'remove_cart','uses' => 'frontend\PhoneController@remove_cart']);
