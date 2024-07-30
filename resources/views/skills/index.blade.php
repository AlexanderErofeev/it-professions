
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Навыки</h2>
        <div class="row">
            @foreach($skills as $skill)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ Storage::url($skill->image_path) }}" alt="{{ $skill->title }}" class="card-img-top">
                        <div class="card-body">
                            <a href="{{ route('skills.show', $skill) }}"><h5 class="card-title">{{ $skill->title }}</h5></a>
                            <p class="card-text">{{ $skill->short_description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
