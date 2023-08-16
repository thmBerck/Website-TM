<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use App\Models\ContactRequest;
use App\Models\Faq;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
        $users = User::all();
        $roles = Role::all();
        return view('admin.roles',compact('users', 'roles'));
    }
    public function changeRole(Request $request, User $user)
    {
        // Validate the request data
        $request->validate([
            'role' => ['required', 'exists:roles,name'],
        ]);

        // Get the new role from the request
        $newRole = $request->input('role');

        // Revoke all current roles from the user
        $user->roles()->detach();

        // Assign the new role to the user
        $user->assignRole($newRole);

        // Redirect back with a success message
        return back()->with('success', 'The user\'s role has been changed successfully.');
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
     * Show the form for editing the user.
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
    public function destroy(Request $request, $userId): RedirectResponse
    {
        // Find the user by their ID
        $user = User::find($userId);

        // Delete the user
        $user->delete();

        // Redirect to a page of your choice
        return Redirect::to('/');
    }
}