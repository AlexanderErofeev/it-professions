
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Навыки</h2>
        <form action="{{ url('/skills/upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">URL-имя</label>
                <input type="text" name="slug" id="slug" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Короткое описание</label>
                <input type="text" name="short_description" id="short_description" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Полное описание</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" name="image_path" id="image_path" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
        <hr>

        <h2>Навыки</h2>
        <div class="row">
            @foreach($skills as $skill)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ Storage::url($skill->image_path) }}" alt="{{ $skill->title }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $skill->title }}</h5>
                            <p class="card-text">{{ $skill->slug }}</p>
                            <p class="card-text">{{ $skill->short_description }}</p>
                            <p class="card-text">{{ $skill->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
