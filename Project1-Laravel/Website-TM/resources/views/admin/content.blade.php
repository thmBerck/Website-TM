@extends('layout')

@section('content')
<div class="body-news p-3 bg-light mb-4">
    <a href="{{ route('news.create') }}" class="btn btn-success btn-sm mb-3">Create Article</a>
    <h1>News</h1>

    @foreach($news_items as $news_item)
    <div class="news-item p-3 bg-white mt-3">
        <h2>{{ $news_item->title }}</h2>
        <p>{{ $news_item->content }}</p>
        <p>{{ $news_item->publishing_date }}</p>
        <div class="manage-news-item d-flex">
            <form method="GET" action="{{ route('news.edit', $news_item->id) }}" class="me-2">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            <form method="POST" action="{{ route('news.delete', $news_item->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
