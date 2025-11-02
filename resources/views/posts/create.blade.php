<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>新規投稿作成</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">タイトル：</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="content">内容：</label>
            <textarea name="content" id="content" rows="5"></textarea>
        </div>

        <button type="submit">投稿する</button>
    </form>
</div>
@endsection
