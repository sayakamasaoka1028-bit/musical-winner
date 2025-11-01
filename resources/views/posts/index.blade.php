<!DOCTYPE html>
<html>
<head>
    <title>Mini BBS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        /* 投稿フォームカード */
        .post-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .post-form input[type="text"],
        .post-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .post-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .post-form button:hover {
            background-color: #45a049;
        }

        /* 投稿一覧 */
        .post-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 10px;
        }

        .post-item strong {
            color: #333;
        }

        .post-item small {
            color: #999;
            float: right;
        }
    </style>
</head>
<body>
    <h1>掲示板</h1>

    <!-- 投稿フォーム -->
    <div class="post-form">
        <form action="/posts" method="POST">
            @csrf
            <input type="text" name="name" placeholder="名前">
            <textarea name="content" placeholder="投稿内容"></textarea>
            <button type="submit">投稿</button>
        </form>
    </div>

    <h2>投稿一覧</h2>

    <!-- 投稿の表示 -->
    @foreach ($posts as $post)
        <div class="post-item">
            <strong>{{ $post->name }}</strong>
            <small>{{ $post->created_at->format('Y-m-d H:i') }}</small>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
</body>
</html>
