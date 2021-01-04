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
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('orders', 'OrderController');
Route::resource('discounts', 'DiscountController');
Route::get('discounts/makeAsUnavailable/{discount}', 'DiscountController@makeAsUnavailable')->name('discounts.makeAsUnavailable');
Route::get('discounts/makeAsAvailable/{discount}', 'DiscountController@makeAsAvailable')->name('discounts.makeAsAvailable');
Route::resource('subscriptions', 'SubscriptionController');
Route::get('setting/general', 'SettingController@general')->name('setting.general');
Route::put('setting/updateGeneral/{setting}', 'SettingController@updateGeneral')->name('setting.updateGeneral');

Route::resource("sliders", "SlidersController");
// Messages
Route::get('message/', 'MessageController@index')->name('message.index');
Route::get('message/{message}', 'MessageController@show')->name('message.show');
Route::get('message/makeRead/{message}', 'MessageController@makeAsRead')->name('message.makeAsRead');
Route::put('message/replyNotification/{message}', 'MessageController@replyNotification')->name('message.replyNotification');
Route::put('message/replySMS/{message}', 'MessageController@replySMS')->name('message.replySMS');
Route::put('message/replyEmail/{message}', 'MessageController@replyEmail')->name('message.replyEmail');
// Complaints
Route::get('complaint/', 'complaintController@index')->name('complaint.index');
Route::get('complaint/{complaint}', 'ComplaintController@show')->name('complaint.show');
Route::get('complaint/makeRead/{complaint}', 'ComplaintController@makeAsRead')->name('complaint.makeAsRead');
Route::put('complaint/replyNotification/{complaint}', 'ComplaintController@replyNotification')->name('complaint.replyNotification');
Route::put('complaint/replySMS/{complaint}', 'ComplaintController@replySMS')->name('complaint.replySMS');
Route::put('complaint/replyEmail/{complaint}', 'ComplaintController@replyEmail')->name('complaint.replyEmail');
