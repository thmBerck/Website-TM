<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckifAdmin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::name('faq.')->prefix('faq')->group(function() {
    Route::get('/', [FaqController::class, 'index'])->name('index');
    Route::get('/create', [FaqController::class, 'create'])->name('create');
    Route::post('/store', [FaqController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('edit');
    Route::delete('/delete/{id}', [FaqController::class, 'destroy'])->name('delete');
    Route::put('/update/{id}', [FaqController::class, 'update'])->name('update');
});
Route::name('news.')->prefix('news')->group(function() {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/create', [NewsController::class, 'create'])->name('create');
    Route::post('/store', [NewsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
    Route::delete('/delete/{id}', [NewsController::class, 'destroy'])->name('delete');
    Route::put('/update/{id}', [NewsController::class, 'update'])->name('update');
});
Route::name('contact.')->prefix('contact')->group(function() {
    Route::get('/', [HomeController::class, 'contact'])->name('index');
});
Route::name('aboutus.')->prefix('aboutus')->group(function() {
    Route::get('/', [HomeController::class, 'aboutus'])->name('index');
});
Route::name('contact.')->prefix('contact')->group(function() {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::get('/show/{id}', [ContactController::class, 'show'])->name('show');
    Route::post('/store', [ContactController::class, 'store'])->name('store');
    Route::post('/reply/{id}', [ContactController::class, 'reply'])->name('reply');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');
    Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::get('/admin/roles', [AdminController::class, 'roles'])->name('admin.roles');
    Route::post('/contact/archive/{id}', [ContactController::class, 'archive'])->name('contact.archive');
    Route::post('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
});


require __DIR__.'/auth.php';
