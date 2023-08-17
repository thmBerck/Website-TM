@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Contact Us</h1>
                </div>
                <div class="container">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" rows="4" cols="50" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger m-4">
                    <h4 class="alert-heading">Errors:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Contact Requests</h1>
                </div>
                <div class="card-body">
                    <div class="contact-index">
                        @foreach($contact_requests as $contact_request)
                        <div class="mb-4">
                            <a href="{{ route('contact.show', $contact_request->id) }}">Contact request: {{ $contact_request->subject }}</a>
                            <p>{{ $contact_request->publishing_date }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
