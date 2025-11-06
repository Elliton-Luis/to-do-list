@extends('layouts.default')

@section('title', 'Lista de Tarefas')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Tarefas</h1>
        <a href="{{ route('tasks.create') }}"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Nova Tarefa
        </a>
    </div>

    <form method="GET" action="{{ route('tasks.index') }}" class="mb-6">
        <div class="flex items-center space-x-3">
            <select name="status" id="status"
                class="block w-48 h-10 p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="todas" {{ request('status') == 'todas' ? 'selected' : '' }}>Todas</option>
                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendentes</option>
                <option value="concluida" {{ request('status') == 'concluida' ? 'selected' : '' }}>Concluídas</option>
            </select>
            <button type="submit"
                class="px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md shadow-sm hover:bg-gray-50">
                Filtrar
            </button>
        </div>
    </form>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">

        <table class="w-full hidden lg:table">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Título</th>
                    <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Criado em</th>
                    <th class="p-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($tasks as $task)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="p-4 whitespace-nowrap">
                            <a href="{{ route('tasks.show', $task) }}" class="font-medium text-indigo-600 hover:text-indigo-800 hover:underline">
                                {{ $task->title }}
                            </a>
                        </td>
                        <td class="p-4 whitespace-nowrap">
                            @if ($task->status == 'pendente')
                                <span
                                    class="inline-flex items-center px-4 py-2 rounded-full font-medium bg-yellow-100 text-yellow-800">Pendente</span>
                            @else
                                <span
                                    class="inline-flex items-center px-4 py-2 rounded-full font-medium bg-green-100 text-green-800">Concluída</span>
                            @endif
                        </td>
                        <td class="p-4 whitespace-nowrap text-gray-600">{{ $task->created_at->format('d/m/Y') }}</td>
                        <td class="p-4 whitespace-nowrap text-center">
                            <a href="{{ route('tasks.edit', $task) }}"
                                class="font-medium text-indigo-600 hover:text-indigo-800">Editar</a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline ml-4"
                                onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 hover:text-red-800">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="lg:hidden"></tr>
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-500">Nenhuma tarefa encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="lg:hidden divide-y divide-gray-200">
            @forelse ($tasks as $task)
                <div class="p-4 space-y-3 hover:bg-gray-50 transition-colors duration-150">
                    <div class="pb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Título</p>
                        <a href="{{ route('tasks.show', $task) }}">
                            <h3 class="text-lg font-bold text-indigo-600 hover:text-indigo-800 hover:underline transition-colors">
                                {{ $task->title }}
                            </h3>
                        </a>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-2">
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Criado em:</span>
                            <span class="text-gray-600">{{ $task->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div>
                            @if ($task->status == 'pendente')
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pendente</span>
                            @else
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Concluída</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 pt-3 border-t border-gray-100">
                        <a href="{{ route('tasks.edit', $task) }}"
                            class="font-medium text-indigo-600 hover:text-indigo-800 text-sm">Editar</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline"
                            onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="font-medium text-red-600 hover:text-red-800 text-sm">Excluir</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500">Nenhuma tarefa encontrada.</div>
            @endforelse
        </div>
    </div>

    @if ($tasks->hasPages())
        <div class="mt-6">
            {{ $tasks->appends(request()->query())->links() }}
        </div>
    @endif

@endsection
