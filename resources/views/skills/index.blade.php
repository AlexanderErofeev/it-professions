
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Навыки</h2>
        <a href="{{ route('skills.create') }}"><h5 class="card-title">Создать навык</h5></a>
        <div class="row">
            @foreach($skills as $skill)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ Storage::url($skill->image_path) }}" alt="{{ $skill->title }}" class="card-img-top">
                        <div class="card-body">
                            <a href="{{ route('skills.show', $skill) }}"><h5 class="card-title">{{ $skill->title }}</h5></a>
                            <p class="card-text">{{ $skill->short_description }}</p>
                            <p><a href="{{ route('skills.edit', $skill) }}">Изменить</a></p>
                            <form method="POST" action="{{ route('skills.delete', $skill) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
