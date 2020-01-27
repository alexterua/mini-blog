<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $news = Article::all();
        return view('news.index', compact('news'));
    }
}
