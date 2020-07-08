<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return redirect()->route('sale.index');
});

Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('auth/login/twitter', 'Auth\SocialController@getTwitterAuth');
Route::get('auth/login/callback/twitter', 'Auth\SocialController@getTwitterAuthCallback');

Route::get('/home', 'HomeController@index')->name('home');

// user画面
Route::get('/sale', 'SaleController@index')->name('sale.index');
Route::get('/sale/contact', 'SaleController@showContact')->name('sale.show.contact');
Route::get('/sale/cart', 'SaleController@showCart')->name('sale.show.cart');
Route::get('/sale/cart/product/{id}', 'SaleController@showCartProduct')->name('sale.show.cart.product');
Route::get('/sale/product/{id}', 'SaleController@showProduct')->name('sale.show.product');
Route::get('/sale/cart/purchase', 'SaleController@showCartPurchase')->name('sale.show.cart.purchase');
Route::get('/sale/question', 'SaleController@showMycontact')->name('sale.show.myquestion');
Route::get('/sale/{id}/question', 'SaleController@contact')->name('sale.show.question');

Route::post('/sale/product/cart/{id}', 'SaleController@storeCart')->name('sale.store.cart');
Route::post('/sale/contact', 'SaleController@storeContact')->name('sale.store.contact');
Route::post('/sale/purchase/cart', 'SaleController@storeCartPurchase')->name('sale.store.cart.purchase');
Route::put('/sale/cart/{id}', 'SaleController@updateCart')->name('sale.update.cart');
Route::delete('/sale/cart/destroy/{id}', 'SaleController@destroyByCart')->name('sale.destroy.cart');
Route::delete('/sale/contact/{id}', 'SaleController@destroyContact')->name('sale.destroy.contact');


// 管理者画面
Route::get('/admin', 'adminController@index')->name('admin.index');
Route::get('/admin/users', 'adminController@showUsers')->name('admin.users');
Route::get('/admin/user/{id}', 'adminController@editUser')->name('admin.edit.user');
Route::get('/admin/product', 'adminController@showProducts')->name('admin.products');
Route::get('/admin/product/{id}', 'adminController@editProduct')->name('admin.edit.product');
Route::get('/admin/new/product', 'adminController@createProduct')->name('admin.create.product');
Route::get('/admin/contact', 'adminController@showContacts')->name('admin.contacts');
Route::get('/admin/contact/{id}', 'adminController@editComment')->name('admin.editComment');
Route::post('/admin/product/new', 'adminController@storeProduct')->name('admin.store.product');
Route::post('/admin/comment/{id}', 'adminController@storeComment')->name('admin.store.comment');
Route::put('/admin/user/{id}', 'adminController@updateUser')->name('admin.update.user');
Route::post('/admin/{id}/product', 'adminController@updateProduct')->name('admin.update.product');
Route::delete('/admin/product/{id}', 'adminController@destroyProduct')->name('admin.destroy.product');
Route::delete('/admin/{id}/contact', 'adminController@destroyContact')->name('admin.destroy.contact');