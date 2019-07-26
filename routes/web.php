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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('tes', 'ViewController@show_tes');

Route::get('/', 'ViewController@show_first');

Route::post('process-login', 'ProcessController@cek_login');

Route::get('logout', 'ProcessController@logout');

Route::get('form-tambah-mobil', 'ViewController@form_tambah_mobil');
Route::get('form-ubah-mobil/{code}', 'ViewController@form_ubah_mobil');
Route::get('data-mobil', 'ViewController@data_mobil');

Route::post('process-tambah-mobil', 'ProcessController@process_tambah_mobil');
Route::post('process-ubah-mobil', 'ProcessController@process_ubah_mobil');
Route::get('process-hapus-mobil/{code}', 'ProcessController@process_hapus_mobil');

Route::get('form-input-penjualan', 'ViewController@form_penjualan');
Route::post('tambah-penjualan', 'ProcessController@tambah_penjualan');
