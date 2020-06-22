<?php

use Illuminate\Support\Facades\Route;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;


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

/* Product Routes*/
Route::get('/boutique', 'ProductController@index')->name('products.index');
Route::get('/boutique/{slug}', 'ProductController@show')->name('products.show');
Route::get('/search', 'ProductController@search')->name('products.search');

/* Cart Routes */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/panier', 'CartController@index')->name('cart.index');
    Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
    Route::patch('/panier/{rowId}', 'CartController@update')->name('cart.update');
    Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
});


/* Checkout Routes */
Route::group(['middleware' => ['auth']], function () {
Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');
Route::post('/paiement2', 'CheckoutController@store')->name('checkout.store');
Route::get('/merci', 'CheckoutController@thankYou')->name('checkout.thankYou');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

//routes formulaire
Route::group(['middleware' => ['auth']], function () {
Route::get('/formulaire', 'FormController@formulaire')->name('formulaire');
Route::post('formulaire/store', 'FormController@store')->name('formulaire.store');
});

//routes users
Route::group(['middleware' => ['auth']], function () {
Route::get('/home', 'HomeController@index')->name('users.home');
Route::get('/compte/edit', 'HomeController@edit')->name('users.compte');
Route::put('/compte/edit','HomeController@update')->name('users.update');
});


//Route pour les factures
Route::get('/pdf/{order}', ['as' => 'order.pdf', 'uses' => 'OrderController@orderPdf']);

//Route pour le mail
Route::get('/email', function () {
    Mail:: to('email@email.com')->send(new OrderMail());
    return new OrderMail();
});