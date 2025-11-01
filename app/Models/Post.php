<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Eloquent モデルの基底クラス

use Illuminate\Database\Eloquent\Factories\HasFactory; // モデル用のファクトリ機能を使うための trait

class Post extends Model
{
  use HasFactory; // ファクトリ機能をこのモデルで使う

    // 一括代入を許可するカラム
    // これがないと Post::create($request->all()) で _token が混ざった時にエラーになる
    protected $fillable = ['name', 'content'];
}
