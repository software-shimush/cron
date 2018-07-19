<?php
use Illuminate\Foundation\Bus\DispatchesJobs;
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
Route::view('/', 'welcome');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('jobs', 'JobController');
Route::put('jobs/{id}/edit', 'JobController@status');
Route::get('users', 'usersController@index');




