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

Route::get('/children-view', 'ChildController@index')->name('children-view');

Route::post('/child/create', 'ChildController@save')->name('child-create');

Route::get('/child/edit', 'ChildController@edit')->name('child-edit');

Route::post('/child/update', 'ChildController@update')->name('child-update');

Route::get('/child/delete/{id}', 'ChildController@destroy')->name('child-delete');

//Sponsor
Route::get('/sponsors-view', 'SponsorController@index')->name('sponsors-view');

Route::post('/sponsor/create', 'SponsorController@save')->name('sponsor-create');

Route::get('/sponsor/edit', 'SponsorController@edit')->name('sponsor-edit');

Route::post('/sponsor/update', 'SponsorController@update')->name('sponsor-update');

Route::get('/sponsor/delete/{id}', 'SponsorController@destroy')->name('sponsor-delete');

//Sponsor Assignment
Route::get('/child-sponsors-assignment/view', 'SponsorAssignmentController@index');

Route::post('/child-sponsor/assign', 'SponsorAssignmentController@assign')->name('sponsor-assign');