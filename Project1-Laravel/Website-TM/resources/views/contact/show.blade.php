@extends('layout')

@section('content')
<div class="contact-request p-3 bg-light mb-4">
    <h2>{{ $contact_request->subject }}</h2>
    <p>{{ $contact_request->message }}</p>
    <p>{{ $contact_request->publishing_date }}</p>
    <div class="replies mt-4">
        @foreach ($contact_request->replies as $reply)
            <div class="reply bg-secondary text-white p-3 mb-3">
                <address>{{ $reply->user->name }}</address>
                <p>{{ $reply->message }}</p>
                <p>{{ $reply->publishing_date }}</p>
            </div>
        @endforeach
    </div>
    <div class="reply-request mt-4">
        <form method="POST" action="{{ route('contact.reply', $contact_request->id) }}">
            @csrf
            @method('POST')
            <div class="input-group">
                <input type="text" class="form-control message-input" name="message" placeholder="Enter your reply" required>
                <button type="submit" class="btn btn-primary">Reply</button>
            </div>
            <p class="text-danger message-validation" style="display: none;">Message must contain non-digit characters.</p>
        </form>
    </div>
</div>
@endsection
