<?php

use Illuminate\Support\Facades\Route; // ルート（URLと処理の紐付け）を使うためのクラス
use App\Http\Controllers\PostController; // コントローラーを読み込む

Route::get('/', [PostController::class, 'index']);  // 投稿一覧
Route::post('/posts', [PostController::class, 'store']); // 投稿保存
