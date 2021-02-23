<?php

// Test
Route::get('/create', 'HomeController@create')->name('create');
Route::get('/show', 'HomeController@show')->name('show');
Route::get('/change_language', 'HomeController@change_language')->name('change.language');
Route::get('/new', 'HomeController@new')->name('new');
Route::get('/table', 'HomeController@table')->name('table');
// End test

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UsersController');
Route::get('/admins', 'UsersController@admins')->name('users.admins');
Route::get('users/block/{user}', 'UsersController@block')->name('users.block');
Route::get('users/unblock/{user}', 'UsersController@unBlock')->name('users.unblock');
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::get('products/featured/{product}', 'ProductController@featured')->name('products.featured');
Route::get('products/unFeatured/{product}', 'ProductController@unFeatured')->name('products.unFeatured');
Route::resource('orders', 'OrderController');
Route::get('order/ofToday', 'OrderController@ordersOfToday')->name('ordersOfToday');

Route::get('order/accepted/{order}', 'OrderController@accepted')->name('orders.accepted');
Route::get('order/reject/{order}', 'OrderController@rejected')->name('orders.rejected');
Route::get('order/delivered/{order}', 'OrderController@delivered')->name('orders.delivered');

Route::resource('discounts', 'DiscountController');
Route::resource('rates', 'RateController');
Route::get('rates/off/{rate}', 'RateController@off')->name('rates.off');
Route::get('rates/on/{rate}', 'RateController@on')->name('rates.on');
Route::get('discounts/makeAsUnavailable/{discount}', 'DiscountController@makeAsUnavailable')->name('discounts.makeAsUnavailable');
Route::get('discounts/makeAsAvailable/{discount}', 'DiscountController@makeAsAvailable')->name('discounts.makeAsAvailable');

Route::get('subscriptions/users/{subscription}', 'SubscriptionController@users')->name('subscriptionUsers');
Route::get('subscriptions/tomorrowSubscription', 'SubscriptionController@tomorrowSubscription')->name('subscriptions.tomorrowSubscription');
Route::get('subscriptions/stoppedSubscriptions', 'SubscriptionController@stoppedSubscription')->name('subscriptions.stoppedSubscriptions');
Route::get('subscriptions/finishedSubscriptions', 'SubscriptionController@finishedSubscription')->name('subscriptions.finishedSubscriptions');
Route::get('subscriptions/allSubscriptions', 'SubscriptionController@allSubscription')->name('subscriptions.allSubscriptions');

Route::resource('subscriptions', 'SubscriptionController');

Route::get('subscriptions/accepted/{subscription}', 'SubscriptionController@accepted')->name('subscriptions.accepted');
Route::get('subscriptions/reject/{subscription}', 'SubscriptionController@rejected')->name('subscriptions.rejected');
Route::get('subscriptions/delivered/{subscription}', 'SubscriptionController@delivered')->name('subscriptions.delivered');

Route::resource('questions', 'QuestionController');
Route::resource("sliders", "SlidersController");
Route::get('sliders/makeAsPending/{slider}', 'SlidersController@makeAsPending')->name('sliders.makeAsPending');
Route::get('sliders/makeAsActive/{slider}', 'SlidersController@makeAsActive')->name('sliders.makeAsActive');
// Messages
Route::get('message/', 'MessageController@index')->name('message.index');
Route::get('message/{message}', 'MessageController@show')->name('message.show');
Route::get('message/makeRead/{message}', 'MessageController@makeAsRead')->name('message.makeAsRead');
Route::put('message/replyNotification/{message}', 'MessageController@replyNotification')->name('message.replyNotification');
Route::put('message/replySMS/{message}', 'MessageController@replySMS')->name('message.replySMS');
Route::put('message/replyEmail/{message}', 'MessageController@replyEmail')->name('message.replyEmail');
// Complaints
Route::get('complaint/', 'ComplaintController@index')->name('complaint.index');
Route::get('complaint/{complaint}', 'ComplaintController@show')->name('complaint.show');
Route::get('complaint/makeRead/{complaint}', 'ComplaintController@makeAsRead')->name('complaint.makeAsRead');
Route::put('complaint/replyNotification/{complaint}', 'ComplaintController@replyNotification')->name('complaint.replyNotification');
Route::put('complaint/replySMS/{complaint}', 'ComplaintController@replySMS')->name('complaint.replySMS');
Route::put('complaint/replyEmail/{complaint}', 'ComplaintController@replyEmail')->name('complaint.replyEmail');

Route::get('/transactions', 'TransactionController@index')->name('transactions.index');

Route::get('settings/general', 'SettingController@general')->name('settings.general');
Route::get('settings/social', 'SettingController@social')->name('settings.social');
Route::get('settings/api', 'SettingController@api')->name('settings.api');
Route::put('settings/Site', 'SettingController@update')->name('settings.update');

Route::get('meals/index', 'OurMealController@index')->name('meals.index');
Route::get('meals/create', 'OurMealController@create')->name('meals.create');
Route::post('meals/store', 'OurMealController@store')->name('meals.store');
Route::get('meals/show/{meals}', 'OurMealController@show')->name('meals.show');
Route::get('meals/edit/{meals}', 'OurMealController@edit')->name('meals.edit');
Route::post('meals/update/{meals}', 'OurMealController@update')->name('meals.update');
Route::match(['delete'],'meals/destroy/{meals}', 'OurMealController@destroy')->name('meals.destroy');


Route::get('/news_letter', 'SettingController@newsLetter')->name('news.letter');
Route::post('/send_news_letter', 'SettingController@sendNewsLetter')->name('send.news.letter');
