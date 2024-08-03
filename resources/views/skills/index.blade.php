@extends('layouts.app')

@section('content')
    <div class="container skills">
        <h1>Навыки
            @auth
                <a href="{{ route('skills.create') }}"><i class="fa-solid fa-plus icon"></i></a>
            @endauth
        </h1>
        <article>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($skills as $skill)
                    <div class="col">
                        <div class="card h-100">
                            <a href="{{ route('skills.show', $skill) }}"><img src="{{ Storage::url($skill->image_path) }}" alt="{{ $skill->title }}" class="card-img-top img-fluid"></a>
                            <div class="card-body">
                                <a href="{{ route('skills.show', $skill) }}"><h5 class="card-title text-center">{{ $skill->title }}</h5></a>
                                <p class="card-text">{{ $skill->short_description }}</p>
                            </div>
                            @auth
                                <div class="admin card-footer">
                                    <a href="{{ route('skills.edit', $skill) }}"><i class="fa-regular fa-pen-to-square icon"></i></a>
                                    <form method="POST" action="{{ route('skills.delete', $skill) }}">
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
