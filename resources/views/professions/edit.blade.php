
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Редактирование профессии</h2>
        <form action="{{ route('professions.update', $profession) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control" required value="{{ $profession->title }}">
            </div>
            <div class="form-group">
                <label for="slug">URL-имя</label>
                <input type="text" name="slug" id="slug" class="form-control" value="{{ $profession->slug }}">
            </div>
            <div class="form-group">
                <label for="description">Полное описание</label>
                <textarea name="description" id="description" class="form-control">{{ $profession->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="short_description">Короткое описание</label>
                <textarea name="short_description" id="short_description" class="form-control">{{ $profession->short_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="example">Пример</label>
                <textarea name="example" id="example" class="form-control">{{ $profession->example }}</textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Изображение</label>
                <input type="file" name="image_path" id="image_path" class="form-control">
                <img src="{{ Storage::url($profession->image_path) }}" class="card-img-top" style="width: 250px;height: auto;" alt="{{ $profession->title }}">
            </div>
            <div class="form-group">
                <label for="occupation">Виды деятельности</label>
                <textarea name="occupation" id="occupation" class="form-control">{{ $profession->occupation }}</textarea>
            </div>
            <div class="form-group">
                <label for="history">История профессии</label>
                <textarea name="history" id="history" class="form-control">{{ $profession->history }}</textarea>
            </div>
            <div class="form-group">
                <label for="demanded_industries">Востребованные отрасли</label>
                <textarea name="demanded_industries" id="demanded_industries" class="form-control">{{ $profession->demanded_industries }}</textarea>
            </div>
            <div class="form-group">
                <label for="career">Карьерный рост</label>
                <textarea name="career" id="career" class="form-control">{{ $profession->career }}</textarea>
            </div>
            <div class="form-group">
                <label for="description_count_vacancies">Описание динамики вакансий</label>
                <textarea name="description_count_vacancies" id="description_count_vacancies" class="form-control">{{ $profession->description_count_vacancies }}</textarea>
            </div>
            <div class="form-group">
                <label for="description_salary">Описания динамики ЗП</label>
                <textarea name="description_salary" id="description_salary" class="form-control">{{ $profession->description_salary }}</textarea>
            </div>
            <div class="form-group">
                <label for="is_have_statistics">Наличие статистики</label>
                <input type="checkbox" name="is_have_statistics" id="is_have_statistics" class="form-check-input" value="1" {{ $profession->is_have_statistics ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
