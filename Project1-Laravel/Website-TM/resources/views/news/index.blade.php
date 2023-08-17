@extends('layout')

@section('content')
<div class="body-news p-3 bg-light mb-1">
    @hasanyrole('admin|owner')
    <a href="{{ route('news.create') }}" class="btn btn-success btn-sm mb-3">Create a new news article</a>
    @endrole
    <h1>News</h1>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    @foreach($news_items as $news_item)
    <div class="news-item p-3 bg-white mt-3">
        <h2>{{ $news_item->title }}</h2>
        <p>{{ $news_item->content }}</p>
        <p>{{ $news_item->publishing_date }}</p>
        @hasanyrole('admin|owner')
        <div class="manage-news-item d-flex">
            <form method="GET" action="{{ route('news.edit', $news_item->id) }}" class="me-2">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </form>
            <form method="POST" action="{{ route('news.delete', $news_item->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
        @endrole
    </div>
    @endforeach
</div>
@endsection
