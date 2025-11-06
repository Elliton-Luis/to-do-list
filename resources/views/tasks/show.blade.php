@extends('layouts.default')

@section('title', 'Detalhes da Tarefa')

@section('content')

    <div class="max-w-xl mx-auto">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Detalhes da Tarefa</h1>
            <a href="{{ route('tasks.edit', $task) }}"
               class="inline-flex items-center px-4 py-2 bg-purple-600 text-white font-medium rounded-md shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                Editar
            </a>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-xl border border-gray-200">
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                <p class="text-lg text-gray-900">{{ $task->title }}</p>
            </div>

            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                @if ($task->description)
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $task->description }}</p>
                @else
                    <p class="text-gray-500 italic">Nenhuma descrição fornecida.</p>
                @endif
            </div>

            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                @if ($task->status == 'pendente')
                    <span
                        class="inline-flex items-center px-4 py-2 rounded-full font-medium bg-yellow-100 text-yellow-800">Pendente</span>
                @else
                    <span
                        class="inline-flex items-center px-4 py-2 rounded-full font-medium bg-green-100 text-green-800">Concluída</span>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-6 border-t pt-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Criado em</label>
                    <p class="text-gray-700">{{ $task->created_at->format('d/m/Y \à\s H:i') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Última Atualização</label>
                    <p class="text-gray-700">{{ $task->updated_at->format('d/m/Y \à\s H:i') }}</p>
                </div>
            </div>

            <div class="flex justify-between items-center mt-8 border-t pt-6">
                <a href="{{ route('tasks.index') }}"
                    class="px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md shadow-sm hover:bg-gray-50">
                    &larr; Voltar para a lista
                </a>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja mover esta tarefa para a lixeira?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-red-700">
                        Mover para Lixeira
                    </button>
                </form>
            </div>

        </div>
    </div>

@endsection
