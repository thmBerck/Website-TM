@extends('layout')

@section('content')
<div class="body-faq p-4">
    {{--<a href="{{route('faq.create')}}">Create a new news article</a>--}}
    {{--This code has been generated by Bing AI. I asked it to find me a way to simplify my code. I had written 3 for each with each an if statement
        that indicated the category. I, myself, thought it was repetitive and I asked Bing or it could fix it and it came up with this. 
        
        This is the explanation for the most important line of code (@foreach($faqs->groupBy('category') as $category => $faqsByCategory)) if I ever need it:
        
        This line of code is using the groupBy method on the $faqs collection to group the FAQs by their category attribute. The result is a new 
        collection where the keys are the different categories and the values are collections of FAQs that belong to each category.

        The foreach loop then iterates over this new collection. In each iteration, the $category variable is assigned the key (i.e., the category name) 
        and the $faqsByCategory variable is assigned the value (i.e., the collection of FAQs that belong to that category).

        So, for example, if you have three categories: “Legal”, “Financial”, and “Communication”, the loop will iterate three times. In the first iteration,
         $category will be “Legal” and $faqsByCategory will be a collection of all the FAQs that have “Legal” as their category. In the second iteration, 
         $category will be “Financial” and $faqsByCategory will be a collection of all the FAQs that have “Financial” as their category, and so on.--}}
    <h1 class="mb-4">Frequently Asked Questions</h1>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    @hasanyrole('admin|owner')
    <a href="{{ route('faq.create') }}" class="mb-3 btn btn-success">Add FAQ</a>
    @endrole

    @foreach($categories as $category)
    <div class="category-box mt-4 p-3 border rounded">
        <h2 class="category-title">{{ $category->name }}</h2>
        @foreach($faqs->where('category_id', $category->id) as $faq)
        <div class="faq mb-4">
            <h3>{{ $faq->question }}</h3>
            <p>{{ $faq->answer }}</p>
            @hasanyrole('admin|owner')
            <div class="manage-faq-item">
                <form method="GET" action="{{ route('faq.edit', $faq->id) }}">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                <form method="POST" action="{{ route('faq.delete', $faq->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            @endrole
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection