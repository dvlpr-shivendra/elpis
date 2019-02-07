<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <title>Circle</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
    <div id="app">

        @include('partials.nav')
        @include('partials.alerts')

        @yield('jumbotron')

        @if ( request()->path() == 'login' || request()->path() == 'register')
            <main class="py-4">            
        @else
            <main class="col-md-6 offset-md-3 py-4">    
        @endif        
            @yield('content')
        </main>
    </div>

    <footer class="footer">
        <div class="text-center">
            <span class="text-muted">Made with Laravel and 
                <i class="fas fa-heart text-danger"></i>.
            </span>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')    
    
</body>
</html>
