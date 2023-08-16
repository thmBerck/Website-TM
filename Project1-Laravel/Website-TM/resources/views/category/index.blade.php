@extends('layout')

@section('content')
<div class="p-3 bg-light mb-1">
    <a href="{{ route('category.create') }}" class="btn btn-success btn-sm mb-3">Create a new FAQ category</a>
    <h1>FAQ Categories</h1>

    @foreach($categories as $category)
    <div class="p-3 bg-white mt-3">
        <h2>{{ $category->name }}</h2>
        @hasanyrole('admin|owner')
        <div class="d-flex">
            <form method="GET" action="{{ route('category.edit', $category->id) }}" class="me-2">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
            </form>
            <form method="POST" action="{{ route('category.delete', $category->id) }}">
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