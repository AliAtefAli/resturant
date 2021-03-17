<?php

Auth::routes();

Route::group(['name' => '', 'namespace' => 'Web'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::post('/user_login', 'AuthController@userLogin')->name('User.login');

    Route::get('/change_language', 'HomeController@change_language')->name('change.language');

    Route::view('about-us', 'web.settings.about_us')->name('about_us');
    Route::get('/common_questions', 'SettingController@faq')->name('common_questions');
    Route::post('send/complaints', 'SettingController@sendComplaint')->name('sendComplaint');
    Route::view('/terms', 'web.settings.terms')->name('terms');
    Route::get('subscriptions', 'SubscriptionController@index')->name('subscriptions.index');

//    Route::resource('products', 'ProductController');
//    Route::post('products/addToCart/{product}', 'CartController@addToCart')->name('products.addToCart');
//    Route::get('cart/remove/{row}', 'CartController@removeFromCart')->name('cart.remove');

//    Route::get('/categories', 'CategoryController@categories')->name('categories.index');
//    Route::get('/category/index/{id}', 'CategoryController@categoryIndex')->name('category.index');
    Route::get('/subscriptions/{subscription}/show', 'SubscriptionController@show')->name('subscriptions.show');

    Route::post('send/message', 'SettingController@sendMessage')->name('sendMessage');

    Route::get('/reset_pass', 'AuthController@resetUserPassword')->name('reset_pass');
    Route::post('/get_code', 'AuthController@getCode')->name('get_code');
    Route::get('/code_confirm/{user}', 'AuthController@codePage')->name('code_confirm');
    Route::post('/code_confirmation', 'AuthController@codeConfirm')->name('set_confirm');
    Route::post('join-us', 'AuthController@joinUs')->name('join-us');
    Route::get('/menus', 'MenuController@index')->name('menus');

    Route::group(['middleware' => 'auth'], function () {
        Route::view('/contact_us', 'web.settings.contact_us')->name('contact_us');
        Route::get('/complaints', 'SettingController@complaint')->name('complaints');
        Route::get('/rate', 'SettingController@rate')->name('rate');
        Route::post('/rate', 'SettingController@saveRate')->name('save.rate');
        Route::view('/who_are_we', 'web.settings.who_are_we')->name('who_are_we');
        Route::get('/notification', 'UserController@notifications')->name('user.notification');
//        Route::get('/orders', 'OrderController@index')->name('orders');
//        Route::post('/order/checkPayment', 'OrderController@checkPayment')->name('order.checkPayment');
//        Route::post('/order/checkCoupon', 'OrderController@checkCoupon')->name('product.checkCoupon');
//        Route::post('/order/store', 'OrderController@store')->name('order.store');
//        Route::get('/carts', 'CartController@index')->name('carts');
//        Route::view('/redirect', 'web.carts.redirect')->name('payment.redirect');
        Route::get('/subscriptions/{id}/off', 'SubscriptionController@offSubscription')->name('subscriptions.offSubscription');
        Route::get('/subscriptions/{id}/on', 'SubscriptionController@onSubscription')->name('subscriptions.onSubscription');
        Route::get('/subscriptions/{subscription}', 'SubscriptionController@create')->name('subscriptions.create');
        Route::post('/subscriptions/store', 'SubscriptionController@store')->name('subscriptions.store');
        Route::post('/subscriptions/{subscription}/checkPayment', 'SubscriptionController@checkPayment')->name('subscriptions.checkPayment');
        Route::view('/some/route', 'web.subscriptions.redirect')->name('subscriptions.redirect');

        Route::post('/subscriptions/checkCoupon', 'SubscriptionController@checkCoupon')->name('subscriptions.checkCoupon');

        Route::post('/order/coupon', 'OrderController@coupon')->name('order.coupon');

        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/users/fav', 'UserController@fav')->name('users.fav');
        Route::put('users/update/{user}', 'UserController@update')->name('update.profile');
        Route::get('/user_subscriptions', 'UserController@subscriptions')->name('user_subscriptions');
        Route::view('/users/change-password', 'web.users.change-password')->name('users.getChangePassword');
        Route::post('/users/change-password/{user}', 'AuthController@changePassword')->name('users.changePassword');
        // Route::get('payment', 'PaymentController@check')->name('payment.check');
//        Route::get('product/makeFav/{id}', 'UserController@makeFav')->name('products.makeFav');
//        Route::get('product/makeUnFav/{id}', 'UserController@makeUnFav')->name('products.makeUnFav');
    });
});
