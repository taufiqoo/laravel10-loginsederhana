<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// // 127.0.0.1:8000/ ==> view welcome
// Route::get('/', function () {
//     return view('welcome');
// });

// // 127.0.0.1:8000/siswa ==> <h1> SAYA SISWA </h1>
// Route::get('/siswa', function () {
//     return "<h1> SAYA SISWA </h1>";
// });

// // 127.0.0.1:8000/siswa/1 ==> <h1> SAYA SISWA DENGAN ID 1 </h1>
// Route::get('/siswa/{id}', function ($id) {
//     return "<h1> SAYA SISWA DENGAN ID $id </h1>";
// })->where('id', '[0-9]+');

// Route::get('/siswa/{id}/{name}', function ($id, $name) {
//     return "<h1> SAYA SISWA DENGAN ID $id & NAMA $name </h1>";
// })->where(['id' => '[0-9]+', 'name' => '[a-zA-z]+']);


// Route::get('siswa', [SiswaController::class, 'index']);
// Route::get('siswa/{id}', [SiswaController::class, 'detail'])->where('id', '[0-9]+');

Route::resource('siswa', SiswaController::class)->middleware('isLogin');;

Route::get('/sesi', [SessionController::class, 'index'])->middleware('isTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isTamu');
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isTamu');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isTamu');

Route::get('/', function() {
    return view('sesi/welcome');
})->middleware('isTamu');