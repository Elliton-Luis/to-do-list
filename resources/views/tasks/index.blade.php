@extends('layouts.default')

@section('title', 'Lista de Tarefas')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Tarefas</h1>

        <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white font-medium rounded-md shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nova Tarefa
        </a>
    </div>

    <form method="GET" action="{{ route('tasks.index') }}" class="mb-6">
        <label for="status" class="sr-only">Filtrar por status</label>
        <div class="flex items-center space-x-3">
            <select name="status" id="status" class="p-2 h-10 block w-48 rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                <option value="">Todas</option>
                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendentes</option>
                <option value="concluida" {{ request('status') == 'concluida' ? 'selected' : '' }}>Concluídas</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                Filtrar
            </button>
        </div>
    </form>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full">
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
                    <td class="p-4 whitespace-nowrap text-gray-700">{{ $task->title }}</td>
                    <td class="p-4 whitespace-nowrap">
                        @if ($task->status == 'pendente')
                            <span class="inline-flex items-center px-4 py-2 rounded-full font-medium bg-yellow-100 text-yellow-800">
                                Pendente
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 rounded-full font-medium bg-green-100 text-green-800">
                                Concluída
                            </span>
                        @endif
                    </td>
                    <td class="p-4 whitespace-nowrap text-gray-600">{{ $task->created_at->format('d/m/Y') }}</td>
                    <td class="p-4 whitespace-nowrap text-center">
                        <a href="{{ route('tasks.edit', $task) }}" class="font-medium text-purple-600 hover:text-purple-800">Editar</a>
                        <a href="#" class="font-medium text-red-600 hover:text-red-800 ml-4"
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();">
                           Excluir
                        </a>
                        <form id="delete-form-{{ $task->id }}" method="POST" action="{{ route('tasks.destroy', $task) }}" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-gray-500">
                        Nenhuma tarefa encontrada.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $tasks->appends(request()->query())->links() }}
    </div>

@endsection
