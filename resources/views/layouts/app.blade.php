<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>

    <!-- Your Custom CSS -->
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Your Custom JS -->
    @vite('resources/js/app.js')

    <!-- Stack for custom scripts on specific pages -->
    @stack('scripts')

</body>
</html>