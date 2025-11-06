<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query()->where('user_id',Auth::id());

        if ($request->filled('status') && in_array($request->status, ['pendente', 'concluida'])) {
            $query->where('status', $request->status);
        }

        $tasks = $query->latest()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pendente,concluida',
        ]);

        $data['user_id'] = Auth::id();

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pendente,concluida',
        ]);

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa movida para a lixeira!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function trash()
    {
        $tasks = Task::onlyTrashed()->latest()->paginate(10);

        return view('tasks.trash', compact('tasks'));
    }

    public function restore($id)
    {
        Task::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('tasks.trash')->with('success', 'Tarefa restaurada com sucesso!');
    }

    public function forceDelete($id)
    {
        Task::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('tasks.trash')->with('success', 'Tarefa excluída permanentemente!');
    }
}
