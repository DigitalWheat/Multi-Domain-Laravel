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


/* GENERAL APP : LOGIN, REGISTRATION AND SIMPLE DASHBOARD*/
Route::group(
    [
        'domain' => 'app.' . config('app.domain'),
        'as' => 'app.'
    ],
    function () {
        Route::get('/', 'DashboardController@home')->name('home');

        Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'Auth\LoginController@handleLogin')->name('login.post');
        Route::get('/registration', 'Auth\RegistrationController@showRegistrationForm')->name('registration');
        Route::post('/registration', 'Auth\RegistrationController@handleRegistration')->name('registration.post');
        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    }
);


/* SUPER ADMIN : SERVICE MANAGEMENT */
Route::group(
    [
        'domain' => 'admin.' . config('app.domain'),
        'middleware' => ['auth', 'app.is_admin'],
        'as' => 'admin.'
    ],
    function () {
        Route::get('/', 'Admin\DashboardController@home')->name('home');

        // @todo: Metrics, Billing/Subscription Management, etc
    }
);


/* SHOP ROUTES */
Route::group(
    [
        'domain' => '{subdomain}.' . config('app.domain'),
        'middleware' => 'shop.domain',
        'as' => 'shop.'
    ], function () {

    // Shop frontend
    Route::get('/', 'Shop\PageController@home')->name('home');

    // @todo: products, cart, checkout, etc
    // @todo: customer account, orders history, order details, settings


    // Authentication and registration
    Route::get('/login', 'Shop\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Shop\Auth\LoginController@handleLogin')->name('login.post');
    Route::get('/registration', 'Shop\Auth\RegistrationController@showRegistrationForm')->name('registration');
    Route::post('/registration', 'Shop\Auth\RegistrationController@handleRegistration')->name('registration.post');
    Route::post('/logout', 'Shop\Auth\LoginController@logout')->name('logout');


    // SHOP MANAGEMENT
    Route::group(
        [
            'prefix' => 'admin',
            'middleware' => ['auth', 'shop.is_manager'],
            'as' => 'admin.'
        ],
        function () {

            Route::get('/', 'Shop\Admin\DashboardController@home')->name('home');

            // @todo: orders, customers, staff members, etc

        }
    );


}
);
