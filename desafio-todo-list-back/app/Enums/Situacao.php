<?php

namespace App\Enums;

enum Situacao: string
{
    case PENDENTE = 'pendente';
    case EM_PROGRESSO = 'em_progresso';
    case FINALIZADO = 'finalizado';

    /**
     * Retorna o valor padrão.
     */
    public static function default(): self
    {
        return self::PENDENTE;
    }
}
