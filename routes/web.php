<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\projectcontroller;
use App\Http\Controllers\siswacontroller;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registercontroller;
use App\Http\Middleware\Authenticate;
use App\Models\project;
use GuzzleHttp\Middleware;
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
    return view('welcome');
});

/*
Route::get('/admin', function () {
    return view('layout.admin');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/contact', function () {
    return view('contact');
});
*/

//Auth
Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [logincontroller::class, 'index']);
    Route::post('/login/auth', [logincontroller::class, 'authenticate'])->name('login');
    Route::get('/register', [registercontroller::class, 'index'])->name('register.view');
    Route::get('/register/store', [registercontroller::class, 'register'])->name('register');
});

//admin
Route::group(['Middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/mastersiswa', siswacontroller::class);
    Route::resource('/mastercontact', contactcontroller::class);
    Route::resource('/masterproject', projectcontroller::class);
    Route::post('/mastersiswa/{id_siswa}/hapus', [siswacontroller::class, 'hapus'])->name('mastersiswa.hapus');
    Route::get('masterproject/create/{id_siswa}', [projectcontroller::class, 'tambah'])->name('masterproject.tambah');
    Route::get('/mastercontact/create/{id_siswa}', [contactcontroller::class, 'create']);
    Route::post('/mastercontact/store/{id_siswa}', [contactcontroller::class, 'store']);
    Route::post('logout', [logincontroller::class, 'logout'])->name('logout');
});
