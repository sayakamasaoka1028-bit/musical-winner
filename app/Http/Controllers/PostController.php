<?php  // ← これが必須
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // 投稿一覧
    public function index()
    {
        // Postモデルから投稿を全件取得
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

        Post::create($request->all());

        return redirect('/');
    }
}
