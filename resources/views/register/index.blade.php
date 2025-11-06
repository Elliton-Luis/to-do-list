<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - To-Do App</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 text-stone-900 antialiased">

    <div class="flex items-center justify-center min-h-screen px-4 py-12">

        <div class="max-w-md w-full">

            <div class="text-center mb-8">
                <a href="/" class="text-3xl font-bold text-indigo-600 hover:text-indigo-700 transition-colors">
                    To-Do App
                </a>
                <p class="mt-2 text-lg text-gray-600">Crie sua conta</p>
            </div>

            @include('partials.messages')

            <div class="bg-white p-10 rounded-lg shadow-lg border border-gray-200">

                <form action="{{ route('register.store') }}" method="POST" class="space-y-6" x-data="{ show: false }">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50"
                            required autofocus>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50"
                            required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="password" id="password"
                                class="w-full p-3 pr-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50"
                                required>
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-indigo-600"
                                aria-label="Mostrar/Esconder senha">
                                <i x-show="!show" class="bi bi-eye-slash text-lg"></i>
                                <i x-show="show" class="bi bi-eye text-lg" style="display: none;"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmar Senha</label>
                        <input :type="show ? 'text' : 'password'" name="password_confirmation" id="password_confirmation"
                            class="w-full p-3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm bg-gray-50"
                            required>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full inline-flex justify-center items-center px-4 py-3 bg-indigo-600 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Criar Conta
                        </button>
                    </div>
                </form>
            </div>

            <p class="mt-8 text-center text-sm text-gray-600">
                Já tem uma conta?
                <a href="{{ route('login.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Acesse
                </a>
            </p>

        </div>
    </div>

    @livewireScripts
</body>
</html>
