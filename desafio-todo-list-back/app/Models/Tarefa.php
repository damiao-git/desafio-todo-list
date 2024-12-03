<?php

namespace App\Models;

use App\Enums\Situacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    protected $table = 'tarefas';
    protected $casts = [
        'situacao' => Situacao::class,
    ];

    protected $fillable = [
        'titulo',
        'descricao',
        'situacao'
    ];
}
