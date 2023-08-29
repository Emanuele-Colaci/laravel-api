<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])
    </head>

    <body>
        <div class="my-container d-flex justify-content-between">
            <div class="my-content text-bg-secondary d-flex justify-content-center flex-column">
                <a href="{{url('/') }}" class="btn btn-outline-info my-4 mx-4">{{ __('Home') }}</a>
                <a href="{{ Route('admin.project.index') }}" class="btn btn-outline-info my-4 mx-4">Progetti</a>
                <a href="{{ Route('admin.types.index') }}" class="btn btn-outline-info my-4 mx-4">Tipologia</a>
                <a href="{{ Route('admin.technologys.index') }}" class="btn btn-outline-info my-4 mx-4">Tecnologia</a>
                <a href="{{ Route('admin.dashboard') }}" class="btn btn-outline-info my-4 mx-4">Dashboard</a>
            </div>
        </div>
        <main>
            @yield('content')
        </main>
    </body>

</html>