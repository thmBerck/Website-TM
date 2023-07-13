<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;

class HomeController extends Controller
{
    function home() {
        return view('home');
    }
    function aboutus() {
        return view('aboutus.index');
    }
    function news() {
        $news = NewsItem::all();
        return view('news.index',['news_items' => $news]);
    }
    function faq() {
        return view('faq.index');
    }
    function contact() {
        return view('contact.index');
    }
}
