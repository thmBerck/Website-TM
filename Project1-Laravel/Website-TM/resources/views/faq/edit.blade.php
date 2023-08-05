@extends('layout')

@section('content')
<div class="form-edit-faq">
    <h1>Edit a frequently asked question:</h1>
    <form method="POST" action="{{ route('faq.update', $faq->id) }}">
    @csrf
    @method('PUT')
        <label for="question">Question</label><br>
        <input type="text" id="question" name="question" value="{{ $faq->question }}"><br><br>
        <label for="answer">Answer</label><br>
        <input type="text" id="answer" name="answer" value="{{ $faq->answer }}"><br><br>
        <label for="category">Category</label><br>
        <select name="category">
            <option value="Legal" {{ $faq->category == 'Legal' ? 'selected' : '' }}>Legal</option>
            <option value="Communication" {{ $faq->category == 'Communication' ? 'selected' : '' }}>Communication</option>
            <option value="Finance" {{ $faq->category == 'Finance' ? 'selected' : '' }}>Finance</option>
        </select><br>
          
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