<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
    Route::get('angsuran/rekap-bulanan/{bulan}', 'AngsuranController@rekapBulanan')->name('angsuran.rekap-bulanan');
    Route::get('angsuran/print/{id}', 'AngsuranController@print')->name('angsuran.print');
    Route::resource('angsuran', 'AngsuranController')->except('create');
    Route::get('logout', 'UserController@logout')->name('user.logout');
    Route::resource('user', 'UserController');
    Route::get('anggota/create/{kelompok}', 'AnggotaController@create')->name('anggota.create');
    Route::get('anggota/pernyataan/{kelompok}', 'AnggotaController@pernyataan')->name('anggota.pernyataan');
    Route::get('anggota/kuasa/{kelompok}', 'AnggotaController@kuasa')->name('anggota.kuasa');
    Route::get('anggota/ba-pencairan/{kelompok}', 'AnggotaController@pencairan')->name('anggota.pencairan');
    Route::get('anggota/tanda-terima/{kelompok}', 'AnggotaController@tandaTerima')->name('anggota.tanda-terima');
    Route::get('anggota/kuitansi-metrai/{kelompok}', 'AnggotaController@kuitansiMetrai')->name('anggota.kuitansi-metrai');
    Route::get('anggota/kuitansi-non-metrai/{kelompok}', 'AnggotaController@kuitansiNonMetrai')->name('anggota.kuitansi-non-metrai');
    Route::get('anggota/kuitansi-iptw/{kelompok}', 'AnggotaController@kuitansiIptw')->name('anggota.kuitansi-iptw');
    Route::get('anggota/rencana-angsuran/{kelompok}', 'AnggotaController@rencanaAngsuran')->name('anggota.rencanaAngsuran');
    Route::get('anggota/perjanjian-kredit/{kelompok}', 'AnggotaController@perjanjianKredit')->name('anggota.perjanjian-kredit');
    Route::resource('anggota', 'AnggotaController')->except(['create']);
    Route::resource('pernyataan', 'PernyataanController');

    // route rencana angsuran
    Route::get('tambah-rencana-angsuran/{kelompok}', 'RencanaController@create')->name('rencana-angsuran.create');
    Route::post('tambah-rencana-angsuran', 'RencanaController@store')->name('rencana-angsuran.store');

});
