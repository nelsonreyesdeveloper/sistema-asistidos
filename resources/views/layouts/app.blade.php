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
    @stack('styles')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <p style="background-color:#313945; " class=" mb-0  text-white py-2 text-center fw-bold  fs-3">JUZGADO TERCERO DE VIGILANCIA PENITENCIARIA Y DE EJECUCIÓN DE LA PENA</p>
        <nav style="background-color:#313945; " class="navbar navbar-expand-md navbar-light  shadow-sm">
            <div style="width: 80%; margin:0 auto;">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    
                        <img style="width: 120px;" src="{{ asset('img/logoPng.png') }}" alt="">
                    {{-- {{ 'SISTEMA INTERNOS/ASISTIDOS' }} --}}
                </a>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        {{-- <p>gola</p> --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
    @stack('scripts')
</body>

</html>