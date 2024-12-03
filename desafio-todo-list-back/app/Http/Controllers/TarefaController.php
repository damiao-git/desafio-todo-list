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
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function create()
    {
        //
    }

    public function store(TarefaValidator $request)
    {
        $validated = $request->validated();

        $tarefa = Tarefa::create($validated);

        if ($tarefa) {
            return response()->json([
                'status' => '201',
                'mensagem' => 'Tarefa criada com sucesso!',
                'dados' => $tarefa
                , [], JSON_UNESCAPED_UNICODE            ], 201, [], JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                'status' => '400',
                'mensagem' => 'Erro ao criar Tarefa'
            ], 400);
        }
    }

    public function show($id)
    {
        $tarefa = Tarefa::find($id);

        if ($tarefa) {
            return response()->json([
                'status' => 200,
                'dados' => $tarefa
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'mensagem' => 'Tarefa não encontrada.'
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }
    }



    public function edit(Tarefa $tarefa)
    {
        //
    }


    public function update(TarefaValidator $request, Tarefa $tarefa)
    {
        $validated = $request->validated();

        if ($tarefa) {
            $tarefa->update($validated);
        }
        return response()->json([
            'status' => 200,
            'data' => $tarefa
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return response()->json([
            'status' => '200',
            'mensagem' => 'Tarefa excluida com sucesso!'
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function filtrarPorSituacao($situacao){
        $tarefas = Tarefa::where('situacao', $situacao)->get();
        if(count($tarefas) > 0){
            return response()->json([
                'status' => 200,
                'tarefas'=> $tarefas
            ],200, [], JSON_UNESCAPED_UNICODE);
        }
        else{
            return response()->json([
                'status' => 404,
                'mensagem'=> 'Nenhuma tarefa com o status ' . $situacao
            ], 404, [], JSON_UNESCAPED_UNICODE);

        }
    }
}
