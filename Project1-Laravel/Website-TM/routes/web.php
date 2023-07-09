<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::name('news.')->prefix('news')->group(function() {
    Route::get('/', [HomeController::class, 'news'])->name('index');
});
Route::name('faq.')->prefix('faq')->group(function() {
    Route::get('/', [HomeController::class, 'faq'])->name('index');
});
Route::name('news.')->prefix('news')->group(function() {
    Route::get('/', [HomeController::class, 'news'])->name('index');
});
Route::name('contact.')->prefix('contact')->group(function() {
    Route::get('/', [HomeController::class, 'contact'])->name('index');
});
Route::name('aboutus.')->prefix('aboutus')->group(function() {
    Route::get('/', [HomeController::class, 'aboutus'])->name('index');
});