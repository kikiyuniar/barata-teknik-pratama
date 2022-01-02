<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
    return view('front.content.index');
});
Route::get('/dashboard', function () {
    return view('dashboard.main_dashboard.dashboard');
});
Route::get('/about', function () {
    return view('front.content.about');
});
// Route::get('/login', function () {
//     return view('dashboard.auth.login');
// });
// Route::get('/register', function () {
//     return view('dashboard.auth.register');
// });


Route::get('/login', [LoginController::class, 'showFormLogin']);
Route::post('login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'showFormRegister']);
Route::post('register', [LoginController::class, 'register']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/', [LoginController::class, 'authenticate'])->name('dashboard')->middleware('auth');

Route::get('/category', [CategoryController::class, 'show_category']);
Route::post('/category', [CategoryController::class, 'add_category']);

// Route::get('/', [LoginController::class, 'showFormLogin']);
// Route::get('login', [LoginController::class, 'showFormLogin']);
// Route::post('login', [LoginController::class, 'login']);
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('home', [HomeController::class, 'index']);
//     Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');
// });
