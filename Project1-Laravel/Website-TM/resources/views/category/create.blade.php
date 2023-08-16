@extends('layout')

@section('content')
<div class="p-4">
    <h1>Create a FAQ category</h1>
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <label for="name">Name</label><br>
        <input type="text" id="name" name="name"><br><br>
        
        <input type="submit" value="Create" class="btn btn-success">
    </form>
</div>
@if ($errors->any())
    <div class="alert alert-danger p-4 mt-4">
        <h4>Errors:</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection