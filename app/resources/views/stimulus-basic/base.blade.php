<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stimulus-Basic &mdash; @yield('page-title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('/assets/css/style.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ mix('/assets/js/app.js') }}" type="text/javascript" defer></script>
</head>
<body>
    <main>
        @include('stimulus-basic.navbar')
        @yield('content')
    </main>
</body>
</html>
