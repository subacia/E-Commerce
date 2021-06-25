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


Route::get('products-listing', 'LogicController@products_listing_view')->name('product.listing.view');

Route::get('product', 'LogicController@products_view')->name('product.view');

Route::get('signup', 'LogicController@signup_view')->name('sign.up.view');

Route::post('save_user_details', 'LogicController@save_user_details')->name('save.user.details');

Route::get('login', 'LogicController@login_view')->name('login.view');

Route::post('login_check', 'LogicController@login_check')->name('login.post');

Route::post('add_to_cart', 'LogicController@add_to_cart')->name('add.to.cart.items');

Route::get('cart_items', 'LogicController@cart_items_listing')->name('cart.items');

Route::get('checkout', 'LogicController@checkout_view')->name('checkout.view');

Route::get('remove_an_cart_item/{c_i_id}', 'LogicController@remove_an_cart_item')->name('remove.an.item');

Route::post('update_cart_item_qty', 'LogicController@update_cart_item_qty')->name('update.cart.item.qty');

Route::post('place_order', 'LogicController@place_order')->name('place.order');

Route::get('logout', 'LogicController@logout')->name('logout.url');

Route::get('category_wise_products', 'LogicController@category_wise_products')->name('categoy.wise.products');