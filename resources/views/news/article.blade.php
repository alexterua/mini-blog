{{--If you want so that work without ajax -> uncomment all comments for this view --}}
{{--@extends('layouts.layout', ['title' => "Новость №$article->id"])--}}

{{--@section('content')--}}
    <div class="row">
        <div class="card mb-3">
            <img src="{{ 'uploads/' . $article->img ?? asset('img/test.jpg') }}" class="card-img-top" alt="{{ $article->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->text }}</p>
                <p class="card-text"><small class="text-muted"></small></p>
                <a href="{{ route('index') }}" class="btn btn-outline-info btn--right">К новостям</a>
                <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                   class="btn btn-outline-warning btn--right">Редактировать</a>
                <form action="{{ route('article.destroy', ['id' => $article->id]) }}" method="post" style="display:inline-block;" onsubmit="if (confirm('Вы действительно хотите удалить новость?')) { return true } else { return false }">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger" value="Удалить">
                </form>
            </div>
        </div>
    </div>
{{--@endsection--}}

