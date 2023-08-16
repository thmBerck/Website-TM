@extends('layout')

@section('content')
<div class="form-edit-faq">
    <h1>Edit a FAQ category:</h1>
    <form method="POST" action="{{ route('category.update', $category->id) }}">
    @csrf
    @method('PUT')
        <label for="name">Name</label><br>
        <input type="text" id="name" name="name" value="{{ $category->name }}"><br><br>
          
        <input type="submit" value="Done">
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection