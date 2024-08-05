
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Добавление навыка</h2>
        <form action="{{ route('skills.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="slug">URL-имя</label>
                <input type="text" name="slug" id="slug" class="form-control">
            </div>
            <div class="form-group">
                <label for="short_description">Короткое описание</label>
                <textarea name="short_description ckeditor" id="short_description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Полное описание</label>
                <textarea name="description ckeditor" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Изображение</label>
                <input type="file" name="image_path" id="image_path" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
