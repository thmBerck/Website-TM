<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::name('faq.')->prefix('faq')->group(function() {
    Route::get('/', [HomeController::class, 'faq'])->name('index');
});
Route::name('news.')->prefix('news')->group(function() {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/create', [NewsController::class, 'create'])->name('create');
    Route::post('/store', [NewsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
    Route::delete('/delete/{id}', [NewsController::class, 'destroy'])->name('delete');
});
Route::name('contact.')->prefix('contact')->group(function() {
    Route::get('/', [HomeController::class, 'contact'])->name('index');
});
Route::name('aboutus.')->prefix('aboutus')->group(function() {
    Route::get('/', [HomeController::class, 'aboutus'])->name('index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
