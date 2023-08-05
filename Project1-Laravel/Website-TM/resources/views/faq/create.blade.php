@extends('layout')

@section('content')
<div class="form-create-faq">
    <h1>Create a frequently asked question:</h1>
    <form method="POST" action="{{ route('faq.store') }}">
    @csrf
        <label for="question">Question</label><br>
        <input type="text" id="question" name="question"><br><br>
        <label for="answer">Answer</label><br>
        <input type="text" id="imageLink" name="answer"><br><br>
        <label for="category">Category</label><br>
        <select name="category" id="category">
            <option value="Legal">Legal</option>
            <option value="Communication">Communication</option>
            <option value="Finance">Finance</option>
        </select>
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