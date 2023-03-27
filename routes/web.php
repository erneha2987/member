<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\SchoolsController;


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


Route::resource('members', 'MembersController');
Route::resource('schools', 'MembersController');

// Show all members
Route::get('/', 'App\Http\Controllers\MembersController@index')->name('members.index');

// Show all members
Route::get('/members', 'App\Http\Controllers\MembersController@index')->name('members.index');

// Show the form for creating a new member
Route::get('/members/create', 'App\Http\Controllers\MembersController@create')->name('members.create');

// Store a new member
Route::post('/members', 'App\Http\Controllers\MembersController@store')->name('members.store');


// Show a specific member
Route::get('/members_show/{id}', 'App\Http\Controllers\MembersController@show')->name('members.show');

// Show the form for editing a specific member
Route::get('/members_edit/{id}/edit', 'App\Http\Controllers\MembersController@edit')->name('members.edit');

// Update a specific member
Route::put('/members_update/{id}', 'App\Http\Controllers\MembersController@update')->name('members.update');

// Delete a specific member
Route::delete('/members_delete/{id}', 'App\Http\Controllers\MembersController@destroy')->name('members.destroy');

// view a ass school
Route::get('/members_associateshcool/{id}', 'App\Http\Controllers\MembersController@associateshcool')->name('members.associateshcool');

// Show all schools
Route::get('/schools', 'App\Http\Controllers\SchoolsController@index')->name('schools.index');

// Show the form for creating a new school
Route::get('/schools/create', 'App\Http\Controllers\SchoolsController@create')->name('schools.create');

// Store a new school
Route::post('/schools', 'App\Http\Controllers\SchoolsController@store')->name('schools.store');

// Show a specific school
Route::get('/schools/{id}', 'App\Http\Controllers\SchoolsController@show')->name('schools.show');

// Show the form for editing a specific school
Route::get('/schools_edit/{id}/edit', 'App\Http\Controllers\SchoolsController@edit')->name('schools.edit');

// Update a specific school
Route::put('/schools_update/{id}', 'App\Http\Controllers\SchoolsController@update')->name('schools.update');

// Delete a specific school
Route::delete('/schools_delete/{id}', 'App\Http\Controllers\SchoolsController@destroy')->name('schools.destroy');
