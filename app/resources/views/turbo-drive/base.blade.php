<!DOCTYPE html>
<html lang="en">
<head>
    <title>Turbo-Drive &mdash; @yield('page-title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('/assets/css/style.css') }}" type="text/css" rel="stylesheet">
    @stack('styles')
    <script src="{{ mix('/assets/js/app.js') }}" type="text/javascript" defer></script>
    @stack('scripts')
</head>
<body>
    <main>
        @include('turbo-drive.navbar')
        @yield('content')
    </main>
</body>
</html>