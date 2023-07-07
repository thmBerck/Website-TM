<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::name('news.')->prefix('news')->group(function() {
    Route::get('/', function () {
        return view('news.index');
    })->name('index');
});
Route::name('faq.')->prefix('faq')->group(function() {
    Route::get('/', function () {
        return view('faq.index');
    })->name('index');
});
Route::name('contact.')->prefix('contact')->group(function() {
    Route::get('/', function () {
        return view('contact.index');
    })->name('index');
});
Route::name('aboutus.')->prefix('aboutus')->group(function() {
    Route::get('/', function () {
        return view('aboutus.index');
    })->name('index');
});
