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

Route::resource('products', 'ProductController');

Route::get('/', "MainController@main")->name('main');

/*Route::get('products', 'ProductController@index')->name('products.index');

Route::post('products', 'ProductController@store')->name('products.store');

Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/{product}', 'ProductController@show')->name('products.show');

Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

//Permite a Laravel ejecutar esta ruta cuando se usan algunas de las que estan en el arreglo
Route::match(['put', 'patch'], 'products/{product}', 'ProductController@update')->name('products.update');

Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
