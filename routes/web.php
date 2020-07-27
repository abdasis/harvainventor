<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', function(){
    return redirect('/admin');
})->name('home');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'NasabahController@dashboard')->name('nasabah.dashboard');
    Route::resource('nasabah', 'NasabahController');
    Route::get('angsuran/nasabah/{id}', 'AngsuranController@create')->name('angsuran.create');
    Route::get('angsuran/cetak/{id}', 'AngsuranController@downloadRekap')->name('angsuran.cetak-rekap');
    Route::get('angsuran/print/{id}', 'AngsuranController@print')->name('angsuran.print');
    Route::resource('angsuran', 'AngsuranController')->except('create');
    Route::get('logout', 'UserController@logout')->name('user.logout');
    Route::resource('user', 'UserController');
});
