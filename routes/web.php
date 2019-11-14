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


    Route::match(['get', 'post'], '/', ['as' => '/', 'uses' => 'frontend\HomeController@index']);

// Admin Route
    Route::match(['get', 'post'], 'admin-login', ['as' => 'admin-login', 'uses' => 'admin\LoginController@login']);
    Route::match(['get', 'post'], 'register', ['as' => 'register', 'uses' => 'admin\LoginController@register']);
    Route::match(['get', 'post'], 'forgotpassword', ['as' => 'forgotpassword', 'uses' => 'admin\LoginController@forgotpassword']);
    Route::match(['get', 'post'], 'logout', ['as' => 'logout', 'uses' => 'admin\LoginController@logout']);
    Route::match(['get', 'post'], 'createpassword', ['as' => 'createpassword', 'uses' => 'admin\LoginController@createpassword']);
    
//    Route::match(['get', 'post'], 'dashboard', ['as' => 'dashboard', 'uses' => 'admin\dashboard\DashboardController@dashboard']);
    
    $adminPrefix = "";
    Route::group(['prefix' => $adminPrefix, 'middleware' => ['admin']], function() {
        Route::match(['get', 'post'], 'dashboard', ['as' => 'dashboard', 'uses' => 'admin\dashboard\DashboardController@dashboard']);
        Route::match(['get', 'post'], 'dashboard-ajaxAction', ['as' => 'dashboard-ajaxAction', 'uses' => 'admin\dashboard\DashboardController@ajaxAction']);
        
        Route::match(['get', 'post'], 'booking', ['as' => 'booking', 'uses' => 'admin\booking\BookingController@index']);
        Route::match(['get', 'post'], 'add-hoarding', ['as' => 'add-hoarding', 'uses' => 'admin\booking\BookingController@add']);
        Route::match(['get', 'post'], 'edit-hoarding/{id}', ['as' => 'edit-hoarding', 'uses' => 'admin\booking\BookingController@edit']);
        Route::match(['get', 'post'], 'booking-ajaxAction', ['as' => 'booking-ajaxAction', 'uses' => 'admin\booking\BookingController@ajaxAction']);
        
        Route::match(['get', 'post'], 'inquiry', ['as' => 'inquiry', 'uses' => 'admin\inquiry\InquiryController@index']);
        Route::match(['get', 'post'], 'add-inquiry', ['as' => 'add-inquiry', 'uses' => 'admin\inquiry\InquiryController@add']);
        Route::match(['get', 'post'], 'edit-inquiry/{id}', ['as' => 'edit-inquiry', 'uses' => 'admin\inquiry\InquiryController@edit']);
        Route::match(['get', 'post'], 'close-inquiry', ['as' => 'close-inquiry', 'uses' => 'admin\inquiry\InquiryController@closeinquiry']);
        Route::match(['get', 'post'], 'inquirey-ajaxAction', ['as' => 'inquirey-ajaxAction', 'uses' => 'admin\inquiry\InquiryController@ajaxAction']);
    });