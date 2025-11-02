<?php  // ← これが必須
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // 投稿一覧
    public function index()
    {
        // Postモデルから投稿を全件取得（新しい順に）
        $posts = Post::latest()->get();

        // ビューに $posts を渡す
        return view('posts.index', compact('posts'));
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
}
