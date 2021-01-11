<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Web'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/change_language', 'HomeController@change_language')->name('change.language');

    // Route::get('/login', 'AuthController@loginPage')->name('login');

    // Route::get('/register', 'AuthController@RegisterPage')->name('register');

    // Route::get('/forget_pass', 'AuthController@forgetPassPage')->name('forget_pass');

    Route::group(['prefix' => '/settings', 'namespace' => 'Setting'], function () {

        Route::get('/about_us', 'AboutController@index')->name('abouts_us');
        Route::get('/common_questions', 'CommonQuestionController@index')->name('common_questions');
        Route::get('/complaints', 'ComplaintController@index')->name('complaints');
        Route::get('/terms', 'TermController@index')->name('terms');
        Route::get('/who_are_we', 'WhoAreWeController@index')->name('who_are_we');
        Route::get('/contact_us', 'ContactController@index')->name('contact_us');

    });

    Route::get('/carts', 'CartController@index')->name('carts');

    Route::get('/menus', 'MenuController@index')->name('menus');

    Route::get('/orders', 'OrderController@index')->name('orders');

    Route::get('/products', 'ProductController@index')->name('products');

    Route::get('/subscriptions', 'SubscriptionController@index')->name('subscriptions');

    Route::get('/subscriptions/submit', 'SubscriptionController@submit')->name('subscriptions.submit');

    Route::get('/users', 'UserController@index')->name('users');

    Route::get('/user_subscriptions', 'UserSubscriptionController@index')->name('user_subscriptions');
});
