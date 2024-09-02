<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ Vite::asset('resources/images/icon.png') }}" type="image/png" sizes="120x120">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/js/ckeditor.config.js'])
    @include('ckfinder::setup')
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top border-bottom border-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="d-inline-block align-middle" src="{{ Vite::asset('resources/images/logo_img_1.svg') }}" alt="Логотип сайта Найти в IT" width="71" height="60" />
                    <img class="d-inline-block align-middle" src="{{ Vite::asset('resources/images/logo_name.svg') }}" alt="Найти в IT" width="172" height="25" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li><a class="nav-link opacity-50-hover" href="{{ route('professions.index') }}">Профессии</a></li>
                        <li><a class="nav-link opacity-50-hover" href="{{ route('skills.index') }}">Навыки</a></li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link opacity-50-hover" href="{{ route('login') }}">{{ __('Войти') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link opacity-50-hover" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    <main class="py-4">
        @yield('content')
    </main>
    <footer class="mt-auto bg-secondary text-white py-4">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <div><img class="d-inline-block align-middle" src="{{ Vite::asset('resources/images/logo_img_1.svg') }}" alt="Логотип сайта Найти в IT" width="71" height="60" />
                        <img class="d-inline-block align-middle" src="{{ Vite::asset('resources/images/logo_name_footer.svg') }}" alt="Найти в IT" width="172" height="25" /></div>
                        <div class="py-3">Найти в IT - это сайт, который поможет пользователю ответить на все его вопросы о профессиях IT-сферы.<br />
                        Найди себя в IT
                        </div>
                        <div class="text-info copyright">© IT-professions, 2022-{{ now()->year }}</div>
                    </div>
                    <div class="col-3">
                        <h3>Контакты:</h3>
                        <div class="py-3"><span class="text-primary">E-mail:</span> info@it-professions.ru</div>
                        <button type="button" class="btn btn-primary">Оставить отзыв</button>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>
