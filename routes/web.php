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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ch', function(){
    return \App\User::find(5)->add_friend(2);
});

Route::get('/add_friend', function () {
    return \App\User::find(1)->add_friend(4);
});

Route::get('/accept_friend', function () {
    return \App\User::find(4)->accept_friend(1);
});

Route::get('/pending_friends', function () {
    return \App\User::find(4)->pending_friend_request();
});

Route::get('/ids', function () {
    return \App\User::find(4)->friend_ids();
});

Route::get('/is', function () {
    return \App\User::find(1)->is_friends_with(3);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'] ,function(){
    Route::get('/profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);

    Route::get('/profile/edit/profile', [
        'uses' => 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);

    Route::post('/profile/update/profile', [
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);
});
