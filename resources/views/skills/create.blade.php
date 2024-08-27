
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Добавление навыка</h2>
        <form action="{{ route('skills.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control @error('title') is-invalid @enderror @if (old('title')) is-valid @endif" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">URL-имя</label>
                <input type="text" name="slug" value="{{ old('slug') }}" id="slug" class="form-control @error('slug') is-invalid @enderror @if (old('slug')) is-valid @endif" required>
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Короткое описание</label>
                <textarea name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror @if (old('short_description')) is-valid @endif">{{ old('short_description') }}</textarea>
                @error('short_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ckeditor">Полное описание</label>
                <textarea name="description" id="ckeditor" class="form-control @error('description') is-invalid @enderror @if (old('description')) is-valid @endif">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image_path">Изображение</label>
                <input type="file" name="image_path" value="{{ old('image_path') }}" id="image_path" class="form-control @error('image_path') is-invalid @enderror @if (old('image_path')) is-valid @endif">
                @error('image_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
