<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Article::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->short_title = Str::length($request->short_title) > 20 ? Str::limit($request->short_title, 20) : $request->title;
        $article->text = $request->text;
        $article->author_id = rand(1, 4);

        if ($request->file('img')) {
            $filename = Str::random(20) . '.' . $request->file('img')->extension();
            $request->file('img')->move(public_path() . '/uploads', $filename);
            $article->img = $filename;
        }

        $article->save();

        return redirect()->route('index')->with('success', 'Новость успешно создана!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('news.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('news.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->short_title = Str::length($request->short_title) > 20 ? Str::limit($request->short_title, 20) : $request->title;
        $article->text = $request->text;

        if ($request->file('img')) {
            $filename = Str::random(20) . '.' . $request->file('img')->extension();
            $request->file('img')->move(public_path() . '/uploads', $filename);
            $article->img = $filename;
        }

        $article->update();

        return redirect()->route('index')->with('success', 'Новость успешно отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article->img !== null) {
            unlink(public_path('/uploads/' . $article->img));
        }

        $article->delete();

        return redirect()->route('index')->with('success', 'Пост успешно удален!');
    }
}
