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
        // // $validatedNewsItem = $request->validate([
        // //     'title' => 'required|max:64',
        // //     'content' => 'required'
        // // ]);
        // // $newsitem = NewsItem::create($validatedNewsItem);
        // $newsitem = new NewsItem;
        // $newsitem->title = $request->title;
        // $newsitem->content = $request->content;
        // $newsitem->publishing_date = now();
        // $newsitem->save();
        // return redirect('/news');


        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
    
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
        $news = NewsItem::find($id);
        $news->delete();
        return redirect('/news')->with('success', 'News Item deleted with success!');
    }
}
