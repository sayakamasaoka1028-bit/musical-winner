<?php

use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
=======
use App\Http\Controllers\PostController; // ← 追加
>>>>>>> 742876e (新規投稿機能を削除・ダッシュボード整理)
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
<<<<<<< HEAD
=======

    // mini-bbs 投稿機能
    Route::resource('posts', PostController::class);
>>>>>>> 742876e (新規投稿機能を削除・ダッシュボード整理)
});

require __DIR__.'/auth.php';
