<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Task::all();
        return response()->json(
            $task, 200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tarefa' => 'required|string',
            'prioridade' => 'required|string',
            'responsavel' => 'required|string',
            'data_cadastro' => 'required|date',
            'data_inicio' => 'required|date',
            'data_conclusao' => 'required|date',
        ]);

        $task = Task::create($validated);

        return response()->json(
            $task,201
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'tarefa' => 'required|string',
            'prioridade' => 'required|string',
            'responsavel' => 'required|string',
            'data_cadastro' => 'required|date',
            'data_inicio' => 'required|date',
            'data_conclusao' => 'required|date',
        ]);

         $task->update($validated);

        return response()->json(
            $task,200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'message' => 'Task deletada com sucesso!'
        ]);
    }
}
