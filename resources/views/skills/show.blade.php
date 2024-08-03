@extends('layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container mb-4">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-12">
                <h1>{{ $skill->title }}</h1>
                <p>{{ $skill->description }}</p>
            </div>
        </div>
    </div>
@endsection
