@extends('layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container mb-4">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-8">
                <h1>{{ $skill->title }}</h1>
                <p>{!! $skill->description !!}</p>
            </div>
            <div class="col-4">
                <img src="{{ Storage::url($skill->image_path) }}" alt="{{ $skill->title }}" class="card-img-top img-fluid">
            </div>
        </div>
    </div>
@endsection
