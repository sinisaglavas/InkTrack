<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AuthorController::class)->prefix('/author')->name('author.')->group(function () {
    Route::get('/all', 'index')->name('all');
    Route::get('/add','addAuthor')->name('add');
    Route::post('/create','create')->name('create');
    Route::get('/edit/{author}','editAuthor')->name('edit');
    Route::put('/update/{author}', 'update')->name('update');
    Route::get('/delete/{author}','delete')->name('delete');
});

Route::controller(BookController::class)->prefix('/book')->name('book.')->group(function () {
    Route::get('/all', 'index')->name('all');
    Route::get('/add','addBook')->name('add');
    Route::post('/create','create')->name('create');
    Route::get('/edit/{book}','editBook')->name('edit');
    Route::put('/update/{book}', 'update')->name('update');
    Route::get('/delete/{book}','delete')->name('delete');
});




require __DIR__.'/auth.php';
