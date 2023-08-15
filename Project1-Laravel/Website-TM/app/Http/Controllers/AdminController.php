<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use App\Models\ContactRequest;
use App\Models\Faq;

class AdminController extends Controller
{
    /**
     * Display a listing of resources.
     */
    public function index()
    {
        
        return view('admin.index');
    }
    public function contact()
    {
        // Get all the contact requests.
        $contact_requests = ContactRequest::all();

        // Load the view and pass the contact requests.  
        return view('admin.contact')
            ->with('contact_requests', $contact_requests);
    }
    public function content()
    {
        $contact_requests = ContactRequest::all();
        //Get all the frequently asked questions.
        $faqs = Faq::all();

        //Get all the news items.
        $news_items = NewsItem::all();

        // Load the view and pass the data as an array.  
        return view('admin.content', compact('contact_requests', 'news_items', 'faqs'));
    }
    public function roles()
    {
        return view('admin.roles');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
