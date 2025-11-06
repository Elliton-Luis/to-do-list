@extends('layouts.default')

@section('title', 'Lixeira de Tarefas')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Lixeira</h1>
        <a href="{{ route('tasks.index') }}" class="text-sm font-medium text-purple-600 hover:text-purple-800">
            &larr; Voltar para a Lista
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">

        <table class="w-full hidden lg:table">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Título</th>
                    <th class="p-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="p-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($tasks as $task)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="p-4 whitespace-nowrap text-gray-700">{{ $task->title }}</td>
                        <td class="p-4 whitespace-nowrap">
                            @if ($task->status == 'pendente')
                                <span class="inline-flex items-center px-4 py-2 rounded-full font-medium bg-yellow-100 text-yellow-800">Pendente</span>
                            @else
                                <span class="inline-flex items-center px-4 py-2 rounded-full font-medium bg-green-100 text-green-800">Concluída</span>
                            @endif
                        </td>
                        <td class="p-4 whitespace-nowrap text-center">
                            <form action="{{ route('tasks.restore', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="font-medium text-green-600 hover:text-green-800">Restaurar</button>
                            </form>

                            <form action="{{ route('tasks.forceDelete', $task->id) }}" method="POST" class="inline ml-4" onsubmit="return confirm('Exclusão permanente! Tem certeza?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 hover:text-red-800">Excluir Permanente</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="lg:hidden"></tr>
                    <tr>
                        <td colspan="3" class="p-8 text-center text-gray-500">A lixeira está vazia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="lg:hidden divide-y divide-gray-200">
            @forelse ($tasks as $task)
                <div class="p-4 space-y-3 hover:bg-gray-50 transition-colors duration-150">
                    <div class="pb-2">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Título</p>
                        <h3 class="text-lg font-bold text-gray-900">{{ $task->title }}</h3>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</p>
                        <div>
                            @if ($task->status == 'pendente')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pendente</span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Concluída</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 pt-3 border-t border-gray-100">
                        <form action="{{ route('tasks.restore', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="font-medium text-green-600 hover:text-green-800 text-sm">Restaurar</button>
                        </form>
                        <form action="{{ route('tasks.forceDelete', $task->id) }}" method="POST" class="inline" onsubmit="return confirm('Exclusão permanente! Tem certeza?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 hover:text-red-800 text-sm">Excluir Permanente</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500">A lixeira está vazia.</div>
            @endforelse
        </div>
    </div>

    @if ($tasks->hasPages())
        <div class="mt-6">
            {{ $tasks->links() }}
        </div>
    @endif

@endsection
