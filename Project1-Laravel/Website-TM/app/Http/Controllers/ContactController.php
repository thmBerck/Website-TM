<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactRequest;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the contact requests for the currently authenticated user.
        $contact_requests = Auth::user()->contactrequests;

        // Load the view and pass the contact requests.
        return view('contact.index')
            ->with('contact_requests', $contact_requests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'subject.required' => 'The subject field must be filled in.',
            'subject.max' => 'The subject must be less than 65 characters.',
            'message.required' => 'The message field must be filled in.',
        ];
        $validatedData = $request->validate([
            'subject' => 'required | max:64',
            'message' => 'required',
        ]);
    
        $contact = new ContactRequest;
        $contact->user_id = Auth::id();
        $contact->subject = $validatedData['subject'];
        $contact->message = $validatedData['message'];
        $contact->publishing_date = now();
        $contact->save();
    
        return redirect('/contact')->with('success', 'Contact request has been sent to the person responsible!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Get the contact request to show in the view.
        $contact_request = ContactRequest::find($id);

        // load the view and pass the sharks
        return view('contact.show')
            ->with('contact_request', $contact_request);
    }
    public function reply(Request $request, string $id)
    {
        $messages = [
            'message.required' => 'The message field must be filled in.',
        ];
        $validatedData = $request->validate([
            'message' => 'required',
        ]);
    
        $reply = new Reply;
        $reply->user()->associate(Auth::id());
        $reply->contact_request()->associate($id);
        $reply->message = $validatedData['message'];
        $reply->publishing_date = now();
        $reply->save();
        return redirect()->route('contact.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function archive(string $id)
    { 
        $contact_request = ContactRequest::find($id);
        $contact_request->archive = true;
        $contact_request->save();
        return redirect('/admin')->with('success', 'Contact Request archived with success!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact_request = ContactRequest::find($id);
        $contact_request->delete();
        return redirect('/admin')->with('success', 'Contact Request deleted with success!');
    }
}
