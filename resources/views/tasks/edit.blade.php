@extends('layouts.default')

@section('title', 'Editar Tarefa')

@section('content')

    <div class="max-w-xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Tarefa</h1>

        @include('partials.messages')

        <div class="bg-white p-8 rounded-lg shadow-xl border border-gray-200">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}"
                        class="w-full p-3 rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                        required>
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descrição
                        (Opcional)</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="mb-5">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status <span
                            class="text-red-500">*</span></label>
                    <select name="status" id="status"
                        class="p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                        required>
                        <option value="pendente" {{ old('status', $task->status) == 'pendente' ? 'selected' : '' }}>Pendente
                        </option>
                        <option value="concluida" {{ old('status', $task->status) == 'concluida' ? 'selected' : '' }}>
                            Concluída</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-4 mt-8 gap-2">
                    <a href="{{ route('tasks.index') }}"
                        class="px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-purple-600 text-white font-medium rounded-md shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        Salvar Alterações
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
