<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaValidator extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|max:100',
            'descricao' => 'required|max:2000',
            'situacao' => 'required'
        ];
    }
    public function messages(): array {
        return [
            'titulo.required' => 'O campo Título é obrigatório!',
            'titulo.max' => 'Máximo de caracteres no campo Título = 100',
            'descricao.required' => 'O campo Descrição é obrigatório!',
            'descricao.max' => 'Máximo de caracteres no campo Descrição = 2000',
            'situacao.required' => 'O campo Situação é obrigatório!'
        ];
    }
}
