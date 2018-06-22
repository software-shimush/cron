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
Route::view('/', 'welcome');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('jobs', 'JobController')->except([
    'show'
]);

Route::get('/mail', function(){
    $text = "I'm hungary!!!!!!!";
    // return new App\Mail\SendEmail($text);
    Mail::to('you@you.com')->send(new App\Mail\SendEmail($text));
});



