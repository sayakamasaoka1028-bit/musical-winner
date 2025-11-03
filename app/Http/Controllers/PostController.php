<?php  // PHPファイルであることを示す（必須）
namespace App\Http\Controllers; // コントローラの名前空間を指定

use Illuminate\Http\Request; // HTTPリクエストを扱うためのクラスをインポート
use App\Models\Post; // Postモデルをインポート（DBのpostsテーブルに対応）

class PostController extends Controller
{
    // 投稿一覧を表示するメソッド
    public function index()
    	{
        // Postモデルから投稿を全件取得（新しい順に）
        $posts = Post::latest()->get(); // latest()はcreated_at DESCの意味

        // ビュー(posts.index)に$posts変数を渡す
        return view('posts.index', compact('posts')); // compact('posts') は ['posts' => $posts] と同じ意味
    }

    // 投稿保存
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'content' => 'required',
        ]);
   // ログインユーザーのIDを追加

    Post::create([
        'name' => $request->name,
        'content' => $request->content,
        'user_id' => auth()->id(), // ←ここが重要

// 投稿を保存するメソッド
public function store(Request $request)
{
    // 入力バリデーション
    $request->validate([
        'name' => 'required|max:50',    // nameは必須、最大50文字
        'content' => 'required',        // contentは必須
    ]);

    // ログインユーザーのIDを追加して保存
    Post::create([
        'name' => $request->name,       // フォームのnameをセット
        'content' => $request->content, // フォームのcontentをセット
        'user_id' => auth()->id(),      // 現在ログインしているユーザーID
    ]); // ←ここが重要（半角セミコロンで閉じる）

// 投稿後、トップページ('/')にリダイレクト
    return redirect('/'); // ブラウザをトップページに戻す

    }

    // 編集フォームを表示
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
        // SQLイメージ: SELECT * FROM posts WHERE id = ?
    }

    // 更新処理
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|max:50',
            'content' => 'required|max:255',
        ]);

        $post->update($request->only(['name', 'content']));
        // SQL例: UPDATE posts
        // SET name='...', content='...', updated_at=NOW()
        // WHERE id=?

        return redirect('/')->with('message', '投稿を更新しました');
    }

    // 削除処理
    public function destroy(Post $post)
    {
        $post->delete();
        // SQL例: DELETE FROM posts WHERE id=?

        return redirect('/')->with('message', '投稿を削除しました');

    ]);

    return redirect('/');

    }

    // 編集フォームを表示
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
        // SQLイメージ: SELECT * FROM posts WHERE id = ?
    }

    // 更新処理
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|max:50',
            'content' => 'required|max:255',
        ]);

        $post->update($request->only(['name', 'content']));
        // SQL例: UPDATE posts
        // SET name='...', content='...', updated_at=NOW()
        // WHERE id=?

        return redirect('/')->with('message', '投稿を更新しました');
    }

    // 削除処理
    public function destroy(Post $post)
    {
        $post->delete();
        // SQL例: DELETE FROM posts WHERE id=?

        return redirect('/')->with('message', '投稿を削除しました');
    }
  public function create()
    {
        // 投稿作成画面を表示する
        return view('posts.create');
    }

}
