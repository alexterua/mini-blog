@extends('layouts.layout', ['title' => "Редактировать новость №$article->id"])

@section('content')
    <div class="row">
        <h2 style="margin: 2px auto;">Редактирование новости</h2>
    </div>
    <div class="row">
        <form action="{{ route('article.update', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data"
              style="width: 60%; margin-left: 20%;">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input id="title" name="title" class="form-control" type="text" placeholder="Введите название..." required value="{{ old('title') ?? $article->title ?? '' }}">
            </div>
            <div class="form-group">
                <label for="text">Содержание новости</label>
                <textarea class="form-control" name="text" id="text" rows="8" placeholder="Введите текст..." required>{{ old('text') ?? $article->text ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="img">Выберите изображение</label>
                <input type="file" name="img" class="form-control-file" id="img">
            </div>
            <button type="submit" class="btn btn-outline-warning">Изменить</button>
        </form>
    </div>
@endsection
