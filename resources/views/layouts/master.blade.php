<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fintech</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('sweetalert::alert')
    @if (!Request::routeIs('login'))
      @include('components.header')
    @endif

    <main class="container mx-auto px-6 lg:px-16 z-40 py-8 min-h-screen">
        @yield('content')
    </main>
    
    @stack('script')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
