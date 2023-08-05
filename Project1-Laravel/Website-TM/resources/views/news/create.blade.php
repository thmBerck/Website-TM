@extends('layout')

@section('content')
<div class="form-create-news">
    <h1>Create a new News post</h1>
    <form method="POST" action="{{ route('news.store') }}">
    @csrf
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title"><br><br>
        <label for="imageLink">Image Link</label><br>
        <input type="text" id="imageLink" name="imageLink"><br><br>
        <label for="content">Content</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Create">
    </form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection