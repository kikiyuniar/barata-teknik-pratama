<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('category/create', [KategoriController::class, 'create']);
// Route::resource('kategori', KategoriController::class);
// Route::get('category/list', [CategoryController::class, 'list']);

// Route::post('category', [CategoryController::class, 'add_category']);
// Route::get('category/allCategories', [KategoriController::class, 'allCategories']);

// Route::post('register', [LoginController::class, 'register']);