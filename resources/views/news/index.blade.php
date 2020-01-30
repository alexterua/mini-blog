@extends('layouts.layout', ['title' => 'Главная'])

@section('content')
    <div class="row" style="padding-left: 3%;">
        @foreach($news as $article)
            <div class="card" style="width: 29.33%; margin-bottom: 20px; margin-right: 3%;">
                <img src="{{ $article->img ?? asset('img/test.jpg') }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->short_title }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($article->text, 200) }}</p>
                </div>
                <div class="card-footer center">
                    <a href="{{ route('article.show', ['id' => $article->id]) }}" class="btn btn-outline-info">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
