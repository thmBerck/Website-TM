<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // get all the sharks
          $faqs = Faq::all();

          // load the view and pass the sharks
          return view('faq.index')
              ->with('faqs', $faqs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'question.required' => 'The question field must be filled in.',
            'answer.required' => 'The answer field must be filled in.',
            'category.in' => 'This is not a possible category. Possible categories are Communication, Finance & Legal',
        ];
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category' => 'in:Communication,Finance,Legal'
        ]);
    
        $faq = new Faq;
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $faq->category = $validatedData['category'];
        $faq->publishing_date = now();
        $faq->save();
    
        return redirect('/faq')->with('success', 'Frequently asked question created!');
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
        $faq = Faq::find($id);
        return view('faq.edit', ['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'question.required' => 'The question field must be filled in.',
            'answer.required' => 'The answer field must be filled in.',
            'category.in' => 'This is not a possible category. Possible categories are Communication, Finance & Legal',
        ];
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category' => 'in:Communication,Finance,Legal'
        ]);
    
        $faq = Faq::find($id);
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $faq->category = $validatedData['category'];
        $faq->publishing_date = now();
        $faq->save();
    
        return redirect('/faq')->with('success', 'Frequently asked question created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect('/faq')->with('success', 'Frequently asked question deleted with success!');
    }
}
