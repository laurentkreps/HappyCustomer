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
Route::get('/', 'Controller@chooseCampaign');
Route::get('/campaign/{id?}/{language?}', 'Controller@campaign');
Route::get('/vote/{campaign}/{id}', 'Controller@vote');
Route::get('/comingback/{vote}/{way}', 'Controller@comingBack');
Route::get('/create/campaign/', 'Controller@createCampaign');

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/campaigns', 'HomeController@getCampaigns');

Route::post('/admin/new/campaign', 'HomeController@newCampaign');
Route::post('/get/campaign/details', 'HomeController@getCampaignDetails');
Route::post('/admin/edit/campaign', 'HomeController@editCampaignDetails');

Route::get('/admin/delete/campaign/{id}', 'HomeController@deleteCampaignDetails');

Route::get('/admin/ratings', 'HomeController@getRatings');
Route::post('/admin/new/rating', 'HomeController@newRating');
Route::post('/get/rating/details', 'HomeController@getRatingDetails');
Route::post('/admin/edit/rating', 'HomeController@editRating');
Route::get('/admin/delete/rating/{id}', 'HomeController@deleteRating');

Route::get('/admin/statistics/{id?}', 'HomeController@statistics');

Route::get('/admin/languages', 'HomeController@languages');
Route::get('/admin/delete/language/{id}', 'HomeController@deleteLanguage');
Route::post('/admin/new/language', 'HomeController@newLanguage');