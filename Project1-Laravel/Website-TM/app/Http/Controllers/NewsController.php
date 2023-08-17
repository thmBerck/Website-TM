<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the news items
        $news = NewsItem::all();

        // load the view and pass the news items
        return view('news.index')
            ->with('news_items', $news);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'The title must be filled in.',
            'title.max' => 'The title should only contain 100 characters.',
            'content.required' => 'The content must be filled in.'
        ];
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'nullable|image|mimetypes:image/jpeg,image/png,image/jpg,image/gif',
        ], $messages);
    
        $news = new NewsItem;
        $news->title = $validatedData['title'];
        $news->content = $validatedData['content'];
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->imageLink = asset('storage/' . $imagePath);
        }
        
        $news->publishing_date = now();
        $news->save();
    
        return redirect('/news')->with('success', 'News Item created!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news_item = NewsItem::find($id);
        return view('news.edit', ['news_item' => $news_item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'title.required' => 'The title must be filled in.',
            'title.max' => 'The title should only contain 100 characters.',
            'content.required' => 'The content must be filled in.'
        ];
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);
    
        $news_item = NewsItem::find($id);
        $news_item->title = $validatedData['title'];
        $news_item->content = $validatedData['content'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news_item->imageLink = asset('storage/' . $imagePath);
        }
        $news_item->save();

        return redirect('/news')->with('success', 'News item was updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = NewsItem::find($id);
        $news->delete();
        return redirect('/news')->with('success', 'News Item deleted with success!');
    }
}
