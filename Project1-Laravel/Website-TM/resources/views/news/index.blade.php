@extends('layout')

@section('content')
<div class="body-news">
    <a href="{{route('news.create')}}">Create a new news article</a>
    <h1>News</h1> <br>

    @foreach($news_items as $news_item)
    <div class="news-item">
        <h2>{{ $news_item->title}}</h2>
        <p>{{ $news_item->content}}</p>
        <p>{{$news_item->publishing_date}}</p>
        <div class="manage-news-item">
            <form method="POST" action="{{route('news.edit', $news_item->id)}}">
                @csrf
                @method('PUT')
                <button type="submit" value="edit">Edit</button>
            </form>
            <form method="POST" action="{{route('news.delete', $news_item->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" value="delete">Delete</button>
            </form>
        </div>
        <br>
    </div>
    @endforeach
</div>
@endsection