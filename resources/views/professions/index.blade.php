@extends('layouts.app')

@section('content')
    <div class="container professions">
        <h1>Профессии
            @auth
                <a href="{{ route('professions.create') }}"><i class="fa-solid fa-plus icon"></i></a>
            @endauth
        </h1>
        <article>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($professions as $profession)
                    <div class="col">
                        <div class="card h-100">
                            <a href="{{ route('professions.show', $profession) }}"><img src="{{ Storage::url($profession->image_path) }}" alt="{{ $profession->title }}" class="card-img-top img-fluid"></a>
                            <div class="card-body">
                                <a href="{{ route('professions.show', $profession) }}"><h5 class="card-title text-center">{{ $profession->title }}</h5></a>
                                <p class="card-text">{{ $profession->short_description }}</p>
                            </div>
                            @auth
                                <div class="admin card-footer">
                                    <a href="{{ route('professions.edit', $profession) }}"><i class="fa-regular fa-pen-to-square icon"></i></a>
                                    <form method="POST" action="{{ route('professions.delete', $profession) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="fa-regular fa-trash-can delete icon" onclick="return confirm('Вы уверены?')"></button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </div>
@endsection
