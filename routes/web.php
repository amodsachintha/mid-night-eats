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

Auth::routes([
    'verify'=>true
]);

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('oauth.login');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('facebook.callback');
Route::post('/user/password', 'UserController@createPassword')->name('create.password');

Route::get('/', 'HomeController@index')->name('home');

Route::post('/post-test',function (){
   return response()->json(['msg'=>'ok']);
});

//Cart routes
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart/add/item','CartItemController@addToCart')->name('addToCart.item');
Route::post('/cart/add/menu','CartMenuController@addToCart')->name('addToCart.menu');

Route::post('/cart/remove/item','CartItemController@removeFromCart')->name('removeFromCart.item');
Route::post('/cart/remove/menu','CartMenuController@removeFromCart')->name('removeFromCart.menu');

Route::post('/cart/update/item','CartItemController@updateQuantity')->name('updateQuantity.item');
Route::post('/cart/update/menu','CartMenuController@updateQuantity')->name('updateQuantity.item');

//Profile routes
Route::get('/profile/overview','ProfileController@index')->name('profile.index');
Route::get('/profile/orders','ProfileController@orders')->name('profile.orders');
Route::get('/profile/settings','ProfileController@settings')->name('profile.settings');
Route::get('/profile/help','ProfileController@help')->name('profile.help');

Route::post('/profile/avatar/upload','ProfileController@uploadAvatar')->name('profile.uploadAvatar');
Route::post('/profile/password/update','ProfileController@updatePassword')->name('profile.updatePassword');
Route::post('/profile/details/update','ProfileController@updateUserDetails')->name('profile.updateUserDetails');

Route::post('/images/process','ImageController@process')->name('image.process');
Route::delete('/images/delete','ImageController@delete')->name('image.delete');