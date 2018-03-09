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

Route::get('query_test', 'EmployeeController@query');
Route::get('add_emp', 'EmployeeController@add_emp');
Route::get('del_emp/{id}', 'EmployeeController@delete_emp');