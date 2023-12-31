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
        $contact_requests = ContactRequest::all()->where('archive', false);

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
    public function changeRole(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'role' => ['required', 'exists:roles,name'],
        ]);

        //Find the User by id.
        $user = User::find($id);

        // Get the new role from the request.
        $newRole = $request->input('role');

        // Revoke all current roles from the user
        $user->roles()->detach();

        // Assign the new role to the user
        $user->assignRole($newRole);

        //Save the changes.
        $user->save();

        // Redirect back with a success message
        return back()->with('success', 'The user\'s role has been changed successfully.');
    }

    public function adduser()
    {
        return view('admin.createuser');
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