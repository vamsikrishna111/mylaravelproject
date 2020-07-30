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
    return view('login1');
});
Route::get('docs','usercontroller@docs');
Route::get('variable','usercontroller@variable');
Route::get('array','usercontroller@array');
Route::get('show','usercontroller@show');
//Route::get('login1','usercontroller@login');
Route::get('register1','usercontroller@register');
Route::post('insert','usercontroller@insert');

Route::post('accountlogin','usercontroller@accountlogin');
Route::get('accountselect','UserController@accountselect');
Route::get('post','UserController@post');
Route::post('postinsert','UserController@postinsert');
Route::get('accountedit/{id}','UserController@accountedit');
Route::post('accountedit/{id}','UserController@accountupdate');
Route::get('accountdelete/{id}','UserController@accountdelete');
Route::get('dashboard','UserController@publish');
Route::get('login1','UserController@logout');

Route::get('bootstrap','usercontroller@bootstrap');
Route::get('conformpassword','usercontroller@conformpassword');
Route::post('forgetpassword','usercontroller@forgetpassword');
Route::get('aboutus',['middleware'=>'Age','uses'=> 'UserController@aboutus']);
Route::get('contact', 'UserController@contact');
Route::get('about', 'UserController@about');
Route::get('portfolio','UserController@portfolio');
Route::get('pagetop','UserController@starthome');



    Route::get('role',[
        'middleware'=>'Age:21',
        'uses' => 'userController@role',]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
