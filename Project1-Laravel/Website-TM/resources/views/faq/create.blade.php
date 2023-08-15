@extends('layout')

@section('content')
<div class="form-create-faq p-4">
    <h1>Create a Frequently Asked Question:</h1>
    <form method="POST" action="{{ route('faq.store') }}">
        @csrf
        <label for="question">Question</label><br>
        <input type="text" id="question" name="question"><br><br>
        
        <label for="answer">Answer</label><br>
        <textarea id="answer" name="answer" rows="4" cols="50"></textarea><br><br>
        
        <label for="category">Category</label><br>
        <select name="category" id="category">
            <option value="Legal">Legal</option>
            <option value="Communication">Communication</option>
            <option value="Finance">Finance</option>
        </select><br><br>
        
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
