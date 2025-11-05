<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List')</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-stone-100 text-stone-900 antialiased"
      x-data="{ sidebarOpen: false }">

    @include('partials.navbar')

    @include('partials.sidebar')

    <div x-show="sidebarOpen"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/50 z-30 md:hidden" style="display: none;">
    </div>


    <main class="md:pl-64">
        <div class="pt-16 md:pt-10">
            <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-2xl border border-stone-200 sm:p-8">
                @include('partials.messages')
                @yield('content')
            </div>
        </div>
    </main>

</body>
</html>
