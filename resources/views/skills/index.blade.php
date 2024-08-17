@extends('layouts.app')

@section('content')
    <div class="container skills">
        <h1>Навыки</h1>
        <article>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($skills as $skill)
                    <div class="col">
                        <div class="card h-100">
                            <a href="{{ route('skills.show', $skill) }}"><img src="{{ Storage::url($skill->image_path) }}" alt="{{ $skill->title }}" class="card-img-top img-fluid"></a>
                            <div class="card-body">
                                <a href="{{ route('skills.show', $skill) }}"><h5 class="card-title text-center">{{ $skill->title }}</h5></a>
                                <p class="card-text">{!! $skill->short_description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </div>
@endsection
