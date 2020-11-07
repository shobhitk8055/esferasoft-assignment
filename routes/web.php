<?php

use Illuminate\Support\Facades\Route;

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

//Company routes

Route::get('/company', 'CompanyController@index')->name('company');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::get('/company/edit/{company}', 'CompanyController@edit')->name('company.edit');
Route::post('/company/update', 'CompanyController@update')->name('company.update');
Route::post('/company/delete', 'CompanyController@delete')->name('company.delete');

//Employee routes
Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
Route::post('/employee/store', 'EmployeeController@store')->name('employee.store');
Route::get('/employee/edit/{employee}', 'EmployeeController@edit')->name('employee.edit');
Route::post('/employee/update', 'EmployeeController@update')->name('employee.update');
Route::post('/employee/delete', 'EmployeeController@delete')->name('employee.delete');

