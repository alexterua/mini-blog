@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row" style="padding-left: 3%;">
            @foreach($news as $article)
                <div class="card" style="width: 29.33%; margin-bottom: 20px; margin-right: 3%;">
                    <img src="/img/{{ $article->img ?? 'test.jpg' }}" class="card-img-top" alt="{{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->short_title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($article->text, 200) }}</p>
                    </div>
                    <div class="card-footer center">
                        <a href="{{ route('show', ['id' => $article->id]) }}" class="btn btn-dark">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
