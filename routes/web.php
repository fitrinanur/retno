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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'master'], function () {
    Route::get('/master-data', 'MasterDashboardController@index')->name('master.dashboard');
    Route::resource('/transaction', 'TransactionController')->except('show');
    Route::get('/transaction/import', 'TransactionController@import');
    Route::post('/transaction/import', 'TransactionController@doImport');
    Route::get('/transaction/export', 'TransactionController@export');
    Route::resource('/user', 'UserController');
    Route::resource('/member', 'MemberController');
    Route::resource('/role', 'RolesController');
    Route::resource('/treatment', 'TreatmentController');
    Route::get('/rule', 'RuleController@index');
    Route::post('rule/proses', 'RuleController@proses');
    Route::get('/frequent', 'FrequentController@index')->name('frequent.index');
    
    Route::get('simulasi', 'SimulasiController@index');
    Route::post('simulasi/proses', 'SimulasiController@proses');
   
});
Route::resource('reports', 'ReportsController');
Route::get('/ajax-subcat/{members}/members.json', function($members) {
    // dd($members);
    return App\Member::where('id', $members)->first();
});
Route::post('/ajax-subcat-treatment/treatments.json', 'TransactionController@getCategory');
Route::post('/ajax-subcat-treatment2/treatments2.json', 'TransactionController@getCategory2');
