@extends('layout')

@section('content')
<div class="body-news">
    <button>Manage Latest News page</button>
    <h1>News</h1>

    @foreach($news_items as $news_item)
    <div class="news-item">
        <h2>{{ $news_item->title}}</h2>
        <p>{{ $news_item->content}}</p>
    </div>
    @endforeach
</div>
@endsection