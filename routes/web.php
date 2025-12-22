<?php

use App\Http\Controllers\admin\AboutBackendController;
use App\Http\Controllers\admin\WhyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\HistoryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductBackendController;
use App\Http\Controllers\admin\ProjectBackendController;
use App\Http\Controllers\GoogleAuthController;

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\Frontend\HomeController::class, 'send'])->name('home.send');
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');
Route::get('/product', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'showProduct'])->name('product.show');
Route::get('/project', [App\Http\Controllers\Frontend\ProjectController::class, 'index'])->name('project');
Route::get('/project/{slug}', [App\Http\Controllers\Frontend\ProjectController::class, 'showProject'])->name("project.show");

Route::get('/store', [App\Http\Controllers\Frontend\StoreController::class, 'index'])->name('store');
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');

Route::get('/lang/{locale}', [App\Http\Controllers\LanguageController::class, 'switch'])->name('lang.switch');


Route::get('/google/auth', [GoogleAuthController::class, 'auth']);
Route::get('/google/callback', [GoogleAuthController::class, 'callback']);

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('history', HistoryController::class)->except(['destroy', 'show']);

    Route::resource('category', CategoryController::class)->except(['destroy', 'show']);
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::resource('product_backend', ProductBackendController::class)->except(['destroy', 'show']);
    Route::get('product_backend/delete/{product_backend}', [ProductBackendController::class, 'delete'])->name('product_backend.delete');

    Route::resource('about_backend', AboutBackendController::class)->except(['destroy', 'show']);

    Route::resource('why', WhyController::class)->except(['destroy', 'show']);

    Route::resource('project_backend', ProjectBackendController::class)->except(['destroy', 'show']);
    Route::get('project_backend/delete/{id}', [ProjectBackendController::class, 'delete'])->name('project_backend.delete');


});

require __DIR__.'/auth.php';
