@extends('layout')

@section('content')
<div class="form-edit-news p-3 bg-light mb-4">
    <h1>Edit a News post</h1>
    <form method="POST" action="{{ route('news.update', $news_item->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $news_item->title }}">
        </div>
        <div class="mb-3">
            <label for="imageLink" class="form-label">Image Link</label>
            <input type="text" id="imageLink" name="imageLink" class="form-control" value="{{ $news_item->imageLink }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea id="content" name="content" rows="4" class="form-control">{{ $news_item->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Done</button>
    </form>
</div>
@endsection
