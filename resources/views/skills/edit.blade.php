
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Добавление навыка</h2>
        <form action="{{ route('skills.update', $skill) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control" required value="{{ $skill->title }}">
            </div>
            <div class="form-group">
                <label for="slug">URL-имя</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ $skill->slug }}">
            </div>
            <div class="form-group">
                <label for="short_description">Короткое описание</label>
                <textarea name="short_description" id="short_description" class="form-control">{{ $skill->short_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="ckeditor">Полное описание</label>
                <textarea name="description" id="ckeditor" class="form-control">{{ $skill->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Изображение</label>
                <input type="file" name="image_path" id="image_path" class="form-control">
                <img src="{{ Storage::url($skill->image_path) }}" class="card-img-top" style="width: 250px;height: auto;" alt="{{ $skill->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
