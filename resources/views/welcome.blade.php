@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="offer-title">Найти в <span style="color: #FF8616">IT</span></h1>
                <p class="offer-subtitle">Открой для себя мир IT с нашей уникальной статистикой.
                    Изучи актуальные тенденции: востребованные профессии, ценные навыки, лидирующие компании.
                    Погрузись в обширную информацию о профессиях в сфере IT с нашими статьями.
                    Развивайся в сфере информационных технологий вместе с нами!</p>
            </div>
            <div class="col-4">
                <img alt="Оффер сайта Найти в IT" src="{{ Vite::asset('resources/images/offer.svg') }}">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Разделы</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('professions.index') }}">Профессии</a></li>
                            <li class="list-group-item"><a href="{{ route('skills.index') }}">Навыки</a></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
@endsection
