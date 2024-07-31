
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Добавление профессии</h2>
        <form action="{{ route('professions.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="description">Полное описание</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="short_description">Короткое описание</label>
                <textarea name="short_description" id="short_description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="example">Пример</label>
                <textarea name="example" id="example" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Изображение</label>
                <input type="file" name="image_path" id="image_path" class="form-control">
            </div>
            <div class="form-group">
                <label for="occupation">Виды деятельности</label>
                <textarea name="occupation" id="occupation" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="history">История профессии</label>
                <textarea name="history" id="history" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="demanded_industries">Востребованные отрасли</label>
                <textarea name="demanded_industries" id="demanded_industries" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="career">Карьерный рост</label>
                <textarea name="career" id="career" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="description_count_vacancies">Описание динамики вакансий</label>
                <textarea name="description_count_vacancies" id="description_count_vacancies" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="description_salary">Описания динамики ЗП</label>
                <textarea name="description_salary" id="description_salary" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="is_have_statistics">Наличие статистики</label>
                <input type="checkbox"  name="is_have_statistics" id="is_have_statistics" class="form-check-input">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
