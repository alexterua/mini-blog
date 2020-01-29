@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <h2 style="margin: 0 auto;">Создание новости</h2>
        </div>
        <div class="row">

            <form action="" method="post" style="width: 60%; margin-left: 20%;">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input id="title" class="form-control" type="text" placeholder="Введите название...">
                </div>
                <div class="form-group">
                    <label for="text">Содержание новости</label>
                    <textarea class="form-control" id="text" rows="10" placeholder="Введите текст..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
