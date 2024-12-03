<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('tarefas', TarefaController::class);
Route::get('tarefas/situacao/{situacao}', [TarefaController::class, 'filtrarPorSituacao']);
