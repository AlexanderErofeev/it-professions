@extends('layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container mb-4">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-8">
                <h1>{{ $profession->title }}</h1>
                <p>{!! $profession->description !!}</p>
            </div>
            <div class="col-4">
                <img src="{{ Storage::url($profession->image_path) }}" alt="{{ $profession->title }}" class="card-img-top img-fluid">
            </div>
        </div>
    </div>
@endsection
