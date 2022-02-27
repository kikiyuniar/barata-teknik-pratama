<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SlideController;
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

Route::get('/', [HomeController::class, 'show_index']);

Route::get('/about', [HomeController::class, 'show_about']);
Route::get('auth-btp-true', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);


Route::get('categories', [HomeController::class, 'index']);
Route::get('product', [HomeController::class, 'index_products']);

Route::get('catalog/search', [HomeController::class, 'cari_kategori']);
Route::get('product/search', [HomeController::class, 'cari_product']);

Route::get('product/categories/{slug_kategori}', [HomeController::class, 'show_kategori']);
Route::get('product/subcategories/{slug_sub}', [HomeController::class, 'subshow']);
Route::get('product/detail/{slug}', [HomeController::class, 'showbarang']);
// Route::get('detail', [HomeController::class, 'showbarang']);
Route::get('contact_send', [HomeController::class, 'action_send']);
Route::get('contact_us', [HomeController::class, 'contact']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [Controller::class, 'dashboard']);
    Route::get('contact', [HomeController::class, 'show_contact']);
    Route::get('del_contact/{id}', [HomeController::class, 'del_contact']);

    Route::get('dash_about', [AboutController::class, 'index']);
    Route::post('edit_about/{id}', [AboutController::class, 'update']);
    Route::post('edit_business/{id}', [AboutController::class, 'update_business']);
    Route::post('edit_service/{id}', [AboutController::class, 'update_service']);
    Route::post('edit_vision/{id}', [AboutController::class, 'update_vision']);
    Route::post('edit_home/{id}', [AboutController::class, 'update_home']);

    Route::get('slide', [SlideController::class, 'index_dashboard']);
    Route::get('slide_add', [SlideController::class, 'show_add']);
    Route::post('slide_push', [SlideController::class, 'store_slides']);
    Route::post('slide_pushedit/{id}', [SlideController::class, 'action_update']);
    Route::get('edit_slide/{id}', [SlideController::class, 'show_edit_slides']);
    Route::get('del_slide/{id}', [SlideController::class, 'del_slides']);

    Route::get('products', [BarangController::class, 'index']);
    Route::get('del/{id}', [BarangController::class, 'destroy']);
    Route::get('edit/{id}', [BarangController::class, 'edit_show']);
    Route::get('list_products', [BarangController::class, 'show']);
    Route::post('add_product', [BarangController::class, 'store']);
    Route::post('action_edit/{id}', [BarangController::class, 'update']);
    Route::post('action_edit_category/{id}', [BarangController::class, 'update_category']);
    Route::post('update_img1/{id}', [BarangController::class, 'update_img1']);
    Route::post('update_img2/{id}', [BarangController::class, 'update_img2']);
    Route::post('update_img3/{id}', [BarangController::class, 'update_img3']);
    Route::get('/update_top_product', [BarangController::class, 'update_top_product']);

    Route::get('category', [KategoriController::class, 'index']);
    Route::get('sub_category', [KategoriController::class, 'index2']);
    Route::get('del_category/{id}', [KategoriController::class, 'destroy_kategori']);
    Route::get('del_subcategory/{id}', [KategoriController::class, 'destroy_subkategori']);
    Route::post('add_category', [KategoriController::class, 'create']);
    Route::post('add_sub_category', [KategoriController::class, 'sub_create']);
    Route::post('edit_category/{id}', [KategoriController::class, 'edit_kategori']);
    Route::post('edit_subcategory/{id}', [KategoriController::class, 'edit_subkategori']);
    Route::post('getsubkategori', [KategoriController::class, 'getsubkategori']);
    Route::post('action_edit_kate/{id}', [KategoriController::class, 'getsubkategori']);

    Route::get('profile', [LoginController::class, 'view_profile']);
    Route::get('delete/{id}', [LoginController::class, 'del']);
    Route::post('edit_profile/{id}', [LoginController::class, 'edit_profile']);
    Route::get('register', [LoginController::class, 'showFormRegister']);
    Route::post('register', [LoginController::class, 'register']);
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
