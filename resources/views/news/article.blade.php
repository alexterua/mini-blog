@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card mb-3">
                <img src="/img/{{ $article->img ?? 'test.jpg' }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->text }}</p>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
        </div>
    </div>
@endsection

