@extends('layout')

@section('content')
<div class="contact-user">
    <form method="POST" action="{{ route('contact.store') }}">
        @csrf
            <label for="subject">Subject</label><br>
            <input type="text" id="subject" name="subject"><br><br>
            <label for="message">Message</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
            <input type="submit" value="Send">
        </form>

    <div class="contact-index">
        @foreach($contact_requests as $contact_request)
            <a href="{{route('contact.show', $contact_request->id)}}">Contact request: {{ $contact_request->subject}}</a>
            <p>{{ $contact_request->publishing_date}}</p>
        @endforeach
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
</div>
@endsection