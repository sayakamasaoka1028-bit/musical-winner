<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController; // 投稿用コントローラ
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // トップページ（welcomeビュー）を表示
});

Route::get('/dashboard', function () {
    return view('dashboard'); // ダッシュボードページを表示
})->middleware(['auth', 'verified'])->name('dashboard'); // 認証済み・メール確認済みユーザーのみアクセス可能

Route::middleware('auth')->group(function () {
    // プロフィール関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // プロフィール編集ページ
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // プロフィール更新処理
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // プロフィール削除処理

    // mini-bbs 投稿機能
    Route::resource('posts', PostController::class); // posts用のCRUDルートをまとめて作成
    // 自動生成されるルート:
    // GET /posts -> index（投稿一覧）
    // GET /posts/create -> create（投稿作成画面）
    // POST /posts -> store（投稿保存処理）
    // GET /posts/{post} -> show（投稿詳細）
    // GET /posts/{post}/edit -> edit（投稿編集画面）
    // PUT/PATCH /posts/{post} -> update（投稿更新処理）
    // DELETE /posts/{post} -> destroy（投稿削除処理）
});

require __DIR__.'/auth.php'; // 認証用ルートを読み込み
