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
        // get all the sharks
        $news = NewsItem::all();

        // load the view and pass the sharks
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
            'imageLink.url' => 'The imageLink must be a valid URL.',
        ];
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'content' => 'required|max:255',
            'imageLink' => 'url',
        ], $messages);
    
        $news = new NewsItem;
        $news->title = $validatedData['title'];
        $news->content = $validatedData['content'];
        $news->imageLink = $request->imageLink;
        $news->publishing_date = now();
        $news->save();
    
        return redirect('/news')->with('success', 'News Item created!');
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
        $news_item = NewsItem::find($id);
        return view('news.edit', ['news_item' => $news_item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
    
        $news_item = NewsItem::find($id);
        $news_item->title = $validatedData['title'];
        $news_item->content = $validatedData['content'];
        $news_item->imageLink = $request->imageLink;
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
