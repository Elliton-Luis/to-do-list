<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;

class TaskTrashController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $tasks = Task::onlyTrashed()->where('user_id',Auth::id())->latest()->paginate(10);

        return view('tasks.trash', compact('tasks'));
    }

    public function update($id)
    {
        Task::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('tasks.trash')->with('success', 'Tarefa restaurada com sucesso!');
    }

    public function destroy($id)
    {
        Task::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('tasks.trash')->with('success', 'Tarefa excluída permanentemente!');
    }
}
