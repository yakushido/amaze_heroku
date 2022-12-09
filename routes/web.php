<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\UserController;

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

Route::get('/', [WelcomeController::class,'index']);
Route::get('/gender/{id}', [WelcomeController::class,'show']);
Route::get('/gender/{gender_id}/genre/{genre_id}', [WelcomeController::class,'menu_show']);

Route::get('/campaign', [CampaignController::class,'index']);
Route::get('/campaign/{id}', [CampaignController::class,'show']);
Route::post('/campaign/store', [CampaignController::class,'store'])->name('campaign.store');

Route::get('/dashboard', [AdminController::class,'index']);
Route::get('/menu/delete/{id}', [MenuController::class,'delete'])->name('menu.delete');
Route::get('/menu/{id}/', [MenuController::class,'show'])->name('menu.show');
Route::post('/menu/update/{id}', [MenuController::class,'course_update'])->name('menu.course_update');
Route::post('/menu/store', [MenuController::class,'menu_store'])->name('menu.store');

Route::post('/category/store', [CategoryController::class,'store'])->name('category.store');
Route::get('/category', [CategoryController::class,'index'])->name('category.index');
Route::get('/category/{id}', [CategoryController::class,'show'])->name('category.show');
Route::post('/category/update/{id}', [CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');

Route::get('/parts', [PartsController::class,'index'])->name('parts.index');
Route::post('/parts/update/{id}', [PartsController::class,'update'])->name('parts.update');
Route::post('/parts/delete/{id}', [PartsController::class,'delete'])->name('parts.delete');

Route::get('/user', [UserController::class,'index'])->name('user.index');

require __DIR__.'/auth.php';
