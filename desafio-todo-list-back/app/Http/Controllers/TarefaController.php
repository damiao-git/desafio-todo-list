<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaValidator;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    public function index()
    {
        $tarefas = Tarefa::all();
        return response()->json([
            'tarefas' => $tarefas
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(TarefaValidator $request)
    {
        $validated = $request->validated();

        $tarefa = Tarefa::create($validated);

        if($tarefa){
            return response()->json([
                'status' => '201',
                'mensagem' => 'Tarefa criada com sucesso!',
                'dados' => $tarefa
            ], 201);
        }
        else{
            return response()->json([
                'status' => '400',
                'mensagem' => 'Erro ao criar Tarefa'
            ], 400);

        }
    }

    public function show(Tarefa $tarefa)
    {
        //
    }


    public function edit(Tarefa $tarefa)
    {
        //
    }


    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
