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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::match(['get', 'post'], '/', ['as' => '/', 'uses' => 'frontend\HomeController@index']);








// Admin Route
Route::match(['get', 'post'], 'admin-login', ['as' => 'admin-login', 'uses' => 'admin\LoginController@login']);

Route::match(['get', 'post'], 'register', ['as' => 'register', 'uses' => 'admin\LoginController@register']);
Route::match(['get', 'post'], 'forgotpassword', ['as' => 'forgotpassword', 'uses' => 'admin\LoginController@forgotpassword']);

Route::match(['get', 'post'], 'dashboard', ['as' => 'dashboard', 'uses' => 'admin\dashboard\DashboardController@dashboard']);

// Inventory
//Route::match(['get', 'post'], 'Inventory', ['as' => 'Inventory', 'uses' => 'admin\inventory\InventoryController@newinventory']);
//Route::match(['get', 'post'], 'Inventory-List', ['as' => 'Inventory-List', 'uses' => 'admin\inventory\InventoryController@viewinventory']);
//Route::match(['get', 'post'], 'Update-Inventory/{id}', ['as' => 'Update-Inventory', 'uses' => 'admin\inventory\InventoryController@editinventory']);
//Route::match(['get', 'post'], 'inventory-ajax-action', ['as' => 'inventoryajaxaction', 'uses' => 'admin\inventory\InventoryController@inventoryajaxaction']);

// Vender
Route::match(['get', 'post'], 'vender', ['as' => 'vender', 'uses' => 'admin\vender\VenderController@index']);
Route::match(['get', 'post'], 'add-vender', ['as' => 'add-vender', 'uses' => 'admin\vender\VenderController@add']);
Route::match(['get', 'post'], 'edit-vender/{id}', ['as' => 'edit-vender', 'uses' => 'admin\vender\VenderController@edit']);
Route::match(['get', 'post'], 'vender-ajaxaction', ['as' => 'vender-ajaxaction', 'uses' => 'admin\vender\VenderController@ajaxaction']);

Route::match(['get', 'post'], 'logout', ['as' => 'logout', 'uses' => 'admin\LoginController@logout']);


//agencies route
Route::match(['get', 'post'], 'agencies-dashboard', ['as' => 'agencies-dashboard', 'uses' => 'agencies\AgenciesController@dashboard']);

//user route
Route::match(['get', 'post'], 'user-dashboard', ['as' => 'user-dashboard', 'uses' => 'user\UserController@dashboard']);