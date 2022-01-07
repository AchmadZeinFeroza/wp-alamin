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

Route::get('/', 'DataController@index')->name('data');
Route::get('/data-training', 'DataController@training');
Route::get('/form_tambah', 'DataController@form_tambah');
Route::get('/form-prediksi', 'DataController@form_prediksi');
Route::get('/prediksi', 'DataController@prediksi');
Route::get('/pohon', 'DataController@pohon');
Route::post('/tambah', 'DataController@tambah');
Route::post('/excel', 'DataController@excel');
Route::get('/ubah/{id}', 'DataController@form_ubah');
Route::patch('/ubah/{id}', 'DataController@ubah');
Route::get('/ambil-data/{id}', 'DataController@ambil_data');
Route::delete('/hapus/{id}', 'DataController@hapus');
