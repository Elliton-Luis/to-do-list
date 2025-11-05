<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

    @include('partials.navbar')

    <main class="max-w-3xl mx-auto mt-8 p-6 bg-white shadow-md rounded-xl">
        @include('partials.messages')
        @yield('content')
    </main>

</body>
</html>
