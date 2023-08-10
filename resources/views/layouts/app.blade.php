

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ParcInfo') }}</title>
    @stack('css')
    @stack('scripts')

    <!-- Fonts -->
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    @livewireStyles

<body>
    <div id="app">
   
        <main class="">
            @yield('content')
        </main>
    </div>
  

<script src="{{ asset('js/disableBackButton.js') }}"></script>

@livewireScripts
</body>
</html>