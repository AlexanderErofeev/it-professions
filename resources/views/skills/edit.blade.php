
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Изменение навыка</h2>
        <form action="{{ route('skills.update', $skill) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror @if (old('title')) is-valid @endif" required value="@if (old('title')) {{ old('title') }} @else {{$skill->title}} @endif">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">URL-имя</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror @if (old('slug')) is-valid @endif" required value="@if (old('slug')) {{ old('slug') }} @else {{$skill->slug}} @endif">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="short_description">Короткое описание</label>
                <textarea name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror @if (old('short_description')) is-valid @endif">@if (old('short_description')) {{ old('short_description') }} @else {{$skill->short_description}} @endif</textarea>
                @error('short_description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ckeditor">Полное описание</label>
                <textarea name="description" id="ckeditor" class="form-control @error('description') is-invalid @enderror @if (old('description')) is-valid @endif">@if (old('description')) {{ old('description') }} @else {{$skill->description}} @endif</textarea>
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
                <img src="{{ Storage::url($skill->image_path) }}" class="card-img-top" style="width: 250px;height: auto;" alt="{{ $skill->title }}">
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
