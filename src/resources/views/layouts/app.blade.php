<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'GenesysMeta') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

    @include('partials.navbar')

    <main class="container mx-auto px-6 py-8">

        @yield('content')

    </main>

    @include('partials.footer')

</body>

</html>