<?php

use Carbon\Carbon;

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
//Clear Cache facade value:
Route::get('reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('key:generate');
    Artisan::call('config:cache');
    return '<center><h1>System Rebooted!</h1></center>';
});

Route::get('/', function () {
    return view('welcome');
});

// Developer Routes
Route::group(['namespace' => 'DevCon', 'middleware' => ['auth', 'CheckSuperUser']], function () {
    Route::get('dev-mode/{switch}', 'DevOptionController@devOptions');
    Route::resource('main-menu', 'MenuController');
    Route::resource('sub-menu', 'SubMenuController');
});

// Super User Routes
Route::group(['namespace' => 'BackEndCon', 'middleware' => ['auth', 'CheckSuperUser']], function () {
    Route::resource('menu', 'MenuController');
    Route::resource('user', 'UsersController');
    Route::resource('user-type', 'UserTypesController');
    Route::resource('user-priority-level', 'UserPriorityLevelController');
});

// User Routes only auth permission
Route::group(['namespace' => 'BackEndCon', 'middleware' => ['auth']], function () {
    Route::resource('profile', 'ProfileController');
});

// User Routes with different permission
Route::group(['namespace' => 'BackEndCon', 'middleware' => ['auth', 'checkPermission']], function () {
    Route::resource('dashboard', 'DashboardController');
});

Route::get('dt', function () {
    $date = Carbon::parse('2018-03-16 15:45')->locale('ja');
    echo $date->rawFormat('D');
});

// Turned off Register Routes
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
