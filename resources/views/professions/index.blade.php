
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Профессии</h2>
        <a href="{{ route('professions.create') }}"><h5 class="card-title">Создать профессию</h5></a>
        <div class="row">
            @foreach($professions as $profession)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ Storage::url($profession->image_path) }}" alt="{{ $profession->title }}" class="card-img-top">
                        <div class="card-body">
                            <a href="{{ route('professions.show', $profession) }}"><h5 class="card-title">{{ $profession->title }}</h5></a>
                            <p class="card-text">{{ $profession->short_description }}</p>
                            <p><a href="{{ route('professions.edit', $profession) }}">Изменить</a></p>
                            <form method="POST" action="{{ route('professions.delete', $profession) }}">
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
