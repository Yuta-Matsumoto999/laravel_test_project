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

// user側

    Auth::routes();

    Route::get('/', function () {
        return redirect()->route('sale.index');
    });

    Route::get('auth/login/twitter', 'Auth\LoginController@getTwitterAuth');
    Route::get('auth/login/callback/twitter', 'Auth\LoginController@getTwitterAuthCallback');


    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/sale', 'user\SaleController@index')->name('sale.index');
    Route::get('/sale/contact', 'user\SaleController@showContact')->name('sale.show.contact');
    Route::get('/sale/cart', 'user\SaleController@showCart')->name('sale.show.cart');
    Route::get('/sale/cart/product/{id}', 'user\SaleController@showCartProduct')->name('sale.show.cart.product');
    Route::get('/sale/product/{id}', 'user\SaleController@showProduct')->name('sale.show.product');
    Route::get('/sale/cart/purchase', 'user\SaleController@showCartPurchase')->name('sale.show.cart.purchase');
    Route::get('/sale/question', 'user\SaleController@showMycontact')->name('sale.show.myquestion');
    Route::get('/sale/{id}/question', 'user\SaleController@contact')->name('sale.show.question');
    Route::get('/sale/buys', 'user\SaleController@showBuys')->name('sale.show.buys');
    Route::get('/sale/user', 'user\SaleController@showUser')->name('sale.show.user');
    Route::post('/sale/product/cart/{id}', 'user\SaleController@storeCart')->name('sale.store.cart');
    Route::post('/sale/contact', 'user\SaleController@storeContact')->name('sale.store.contact');
    Route::post('/sale/purchase/cart', 'user\SaleController@storeCartPurchase')->name('sale.store.cart.purchase');
    Route::post('/sale/user', 'user\SaleController@updateUser')->name('sale.update.user');
    Route::put('/sale/cart/{id}', 'user\SaleController@updateCart')->name('sale.update.cart');
    Route::delete('/sale/cart/destroy/{id}', 'user\SaleController@destroyByCart')->name('sale.destroy.cart');
    Route::delete('/sale/contact/{id}', 'user\SaleController@destroyContact')->name('sale.destroy.contact');



// 管理者画面
Route::prefix('admin')->namespace('admin')->name('admin.')->group(function(){


    Auth::routes();

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/', 'adminController@index')->name('index');
    Route::get('/users', 'adminController@showUsers')->name('users');
    Route::get('/user/{id}', 'adminController@confirmUser')->name('confirm.user');
    Route::get('/product', 'adminController@showProducts')->name('products');
    Route::get('/product/{id}', 'adminController@editProduct')->name('edit.product');
    Route::get('/new/product', 'adminController@createProduct')->name('create.product');
    Route::get('/contact', 'adminController@showContacts')->name('contacts');
    Route::get('/contact/{id}', 'adminController@editComment')->name('editComment');
    Route::get('/buys', 'adminController@showBuys')->name('buys');
    Route::get('/buys/{id}', 'adminController@editBuys')->name('edit.buys');
    Route::post('/product/new', 'adminController@storeProduct')->name('store.product');
    Route::post('/comment/{id}', 'adminController@storeComment')->name('store.comment');
    Route::post('/buy/{id}', 'adminController@storeShipping')->name('store.shipping');
    Route::put('/user/{id}', 'adminController@updateUser')->name('update.user');
    Route::post('/{id}/product', 'adminController@updateProduct')->name('update.product');
    Route::delete('/product/{id}', 'adminController@destroyProduct')->name('destroy.product');
    Route::delete('/{id}/contact', 'adminController@destroyContact')->name('destroy.contact');
});

// ['register' => false,
//                   'reset' => false,
//                   'confirm' => false,
//                   'verify' => false
//                 ]