<?php

Auth::routes();

Route::group(['name' => '', 'namespace' => 'Web'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/change_language', 'HomeController@change_language')->name('change.language');

    Route::get('about-us', 'SettingController@aboutUs')->name('about_us');
    Route::get('/common_questions', 'SettingController@faq')->name('common_questions');
    Route::get('/complaints', 'SettingController@complaint')->name('complaints');
    Route::post('send/complaints', 'SettingController@sendComplaint')->name('sendComplaint');
    Route::get('/terms', 'SettingController@terms')->name('terms');

    Route::resource('products', 'ProductController');
    Route::post('products/addToCart/{product}', 'CartController@addToCart')->name('products.addToCart');
    Route::get('cart/remove/{row}', 'CartController@removeFromCart')->name('cart.remove');

    Route::get('/categories', 'CategoryController@categories')->name('categories.index');
    Route::get('/category/index/{id}', 'CategoryController@categoryIndex')->name('category.index');
    Route::get('/subscriptions/{subscription}/show', 'SubscriptionController@show')->name('subscriptions.show');

    Route::get('/contact_us', 'SettingController@message')->name('contact_us');
    Route::post('send/message', 'SettingController@sendMessage')->name('sendMessage');

    Route::get('/reset_pass', 'AuthController@resetUserPassword')->name('reset_pass');
    Route::post('/get_code', 'AuthController@getCode')->name('get_code');
    Route::get('/code_confirm/{user}', 'AuthController@codePage')->name('code_confirm');
    Route::post('/code_confirmation', 'AuthController@codeConfirm')->name('set_confirm');
    Route::post('join-us', 'AuthController@joinUs')->name('join-us');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/rate', 'SettingController@rate')->name('rate');
        Route::post('/rate', 'SettingController@saveRate')->name('save.rate');
        Route::get('/who_are_we', 'SettingController@whoAreWe')->name('who_are_we');
        Route::get('/notification', 'UserController@notifications')->name('user.notification');
        Route::get('/orders', 'OrderController@index')->name('orders');
        Route::post('/order/checkPayment', 'OrderController@checkPayment')->name('order.checkPayment');
        Route::post('/order/checkCoupon', 'OrderController@checkCoupon')->name('product.checkCoupon');
        Route::post('/order/store', 'OrderController@store')->name('order.store');
        Route::get('/carts', 'CartController@index')->name('carts');
        Route::get('/redirect', 'CartController@redirect')->name('payment.redirect');
        Route::get('/subscriptions/{subscription}', 'SubscriptionController@create')->name('subscriptions.create');
        Route::post('/subscriptions/store', 'SubscriptionController@store')->name('subscriptions.store');
        Route::post('/subscriptions/{subscription}/checkPayment', 'SubscriptionController@checkPayment')->name('subscriptions.checkPayment');
        Route::get('/some/route', 'SubscriptionController@redirect')->name('subscriptions.redirect');
        Route::get('/menus', 'MenuController@index')->name('menus');

        Route::post('/order/coupon', 'OrderController@coupon')->name('order.coupon');

        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/users/fav', 'UserController@fav')->name('users.fav');
        Route::put('users/update/{user}', 'UserController@update')->name('update.profile');
        Route::get('/user_subscriptions', 'UserController@subscriptions')->name('user_subscriptions');
        Route::get('/users/change-password', 'AuthController@getChangePassword')->name('users.getChangePassword');
        Route::post('/users/change-password/{user}', 'AuthController@changePassword')->name('users.changePassword');
        Route::get('payment', 'PaymentController@check')->name('payment.check');
        Route::get('product/makeFav/{id}', 'UserController@makeFav')->name('products.makeFav');
        Route::get('product/makeUnFav/{id}', 'UserController@makeUnFav')->name('products.makeUnFav');
    });
});
