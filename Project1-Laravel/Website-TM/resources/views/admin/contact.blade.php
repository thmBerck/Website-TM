@extends('layout')

@section('content')
<div class="admin-contact">
    <h1>Contact Requests</h1>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    @foreach($contact_requests as $contact_request)
    <div class="contact-request-admin p-3 bg-light mb-4">
        <h2>{{ $contact_request->subject }}</h2>
        <p>{{ $contact_request->message }}</p>
        <p>{{ $contact_request->publishing_date }}</p>
        <div class="manage-contact-request d-flex mt-3">
            <form method="GET" action="{{ route('contact.show', $contact_request->id) }}" class="me-2">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-primary">Show</button>
            </form>
            <form method="POST" action="{{ route('contact.archive', $contact_request->id) }}" class="me-2">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-warning">Archive</button>
            </form>
            <form method="POST" action="{{ route('contact.delete', $contact_request->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
