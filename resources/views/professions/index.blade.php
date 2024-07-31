
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Профессии</h2>
        <div class="row">
            @foreach($professions as $profession)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ Storage::url($profession->image_path) }}" alt="{{ $profession->title }}" class="card-img-top">
                        <div class="card-body">
                            <a href="{{ route('professions.show', $profession) }}"><h5 class="card-title">{{ $profession->title }}</h5></a>
                            <p class="card-text">{{ $profession->short_description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
