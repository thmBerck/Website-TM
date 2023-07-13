@extends('layout')

@section('content')
<div class="form-edit-news">
    <h1>Create a new News post</h1>
    <form method="POST" action="{{ route('news.update', $news_item->id) }}">
    @csrf
    @method('PUT')
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" value="{{ $news_item->title }}"><br><br>
        <label for="imageLink">Image Link</label><br>
        <input type="text" id="imageLink" name="imageLink" value="{{ $news_item->imageLink }}"><br><br>
        <label for="content">Content</label><br>
        <input type="text" id="content" name="content" rows="4" cols="50" value="{{ $news_item->content }}"><br><br>
        <input type="submit" value="Done">
    </form>
</div>

@endsection