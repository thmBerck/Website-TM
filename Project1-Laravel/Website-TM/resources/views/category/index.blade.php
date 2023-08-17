@extends('layout')

@section('content')
<div class="p-3 bg-light mb-1">
    <a href="{{ route('category.create') }}" class="btn btn-success btn-sm mb-3">Create a new FAQ category</a>
    <h1>FAQ Categories</h1>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
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