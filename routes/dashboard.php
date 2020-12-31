<?php

// Test
Route::get('/create', 'HomeController@create')->name('create');
Route::get('/show', 'HomeController@show')->name('show');
Route::get('/change_language', 'HomeController@change_language')->name('change.language');
Route::get('/new', 'HomeController@new')->name('new');
Route::get('/table', 'HomeController@table')->name('table');
// End test

Route::get('/', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('orders', 'OrderController');
Route::resource('subscriptions', 'SubscriptionController');
Route::get('setting/edit', 'SettingController@edit')->name('setting.edit');
Route::put('setting/update/{setting}', 'SettingController@update')->name('setting.update');

Route::resource("sliders", "SlidersController");
// Messages
Route::get('message/', 'MessageController@index')->name('message.index');
Route::get('message/{id}', 'MessageController@show')->name('message.show');
Route::get('message/makeRead/{id}', 'MessageController@makeAsRead')->name('message.makeAsRead');
Route::put('message/replyNotification/{id}', 'MessageController@replyNotification')->name('message.replyNotification');
Route::put('message/replySMS/{id}', 'MessageController@replySMS')->name('message.replySMS');
Route::put('message/replyEmail/{id}', 'MessageController@replyEmail')->name('message.replyEmail');
// Complaints
Route::get('complaint/', 'complaintController@index')->name('complaint.index');
Route::get('complaint/{id}', 'ComplaintController@show')->name('complaint.show');
Route::get('complaint/makeRead/{id}', 'ComplaintController@makeAsRead')->name('complaint.makeAsRead');
Route::put('complaint/replyNotification/{id}', 'ComplaintController@replyNotification')->name('complaint.replyNotification');
Route::put('complaint/replySMS/{id}', 'ComplaintController@replySMS')->name('complaint.replySMS');
Route::put('complaint/replyEmail/{id}', 'ComplaintController@replyEmail')->name('complaint.replyEmail');
