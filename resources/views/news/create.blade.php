{{--If you want so that work without ajax -> uncomment all comments for this view --}}
{{--@extends('layouts.layout', ['title' => 'Создать новость'])--}}

{{--@section('content')--}}
    <div class="row">
        <h2 style="margin: 2px auto;">Создание новости</h2>
        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data"
              style="width: 60%; margin-left: 20%;">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input id="title" name="title" class="form-control" type="text" placeholder="Введите название..."
                       value="{{ old('title') ?? $article->title ?? '' }}"
                       required>
            </div>
            <div class="form-group">
                <label for="text">Содержание новости</label>
                <textarea class="form-control" name="text" id="text" rows="8" placeholder="Введите текст..."
                          required>{{ old('text') ?? $article->text ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="img">Выберите изображение</label>
                <input type="file" name="img" class="form-control-file" id="img">
            </div>
            <button id="save" type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
{{--@endsection--}}
