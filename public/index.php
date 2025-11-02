<?php

use Illuminate\Foundation\Application; // Laravelアプリケーション本体を扱うクラス
use Illuminate\Http\Request; // HTTPリクエストを表すクラス

define('LARAVEL_START', microtime(true)); // Laravelの処理開始時間を記録（パフォーマンス測定などに使う）

// Determine if the application is in maintenance mode...
// アプリケーションがメンテナンスモードかどうかを確認
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
// Composerのオートローダーを読み込む（全クラスを自動でロードできるようにする）
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
// Laravelアプリを初期化して、リクエストを処理する準備をする
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// リクエストをキャプチャして、Laravelアプリに渡す（ここでHTTPリクエストが実際に処理される）
$app->handleRequest(Request::capture());
