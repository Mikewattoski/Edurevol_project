<?php
use App\links;
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
    $links=links::orderBy('id', 'DESC')->get();
    return view('edurevol',['links'=>$links]);
})->name('home');                //main page

Route::post('/add', 'maincontroller@add')->name('add');//route to add new link
Route::get('/links', 'maincontroller@filter')->name('filter');//route filter links