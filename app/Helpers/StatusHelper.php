<?php

namespace App\Helpers;

class StatusHelper
{
    public static function formatStatus($status)
    {
        $statuses = [
            'pendente' => ['text' => 'Pendente', 'color' => 'text-yellow-500'],
            'preparacao' => ['text' => 'Em Preparação', 'color' => 'text-yellow-500'],
            'retirar' => ['text' => 'Pronto para Retirar', 'color' => 'text-yellow-500'],
            'entregando' => ['text' => 'Saiu para Entrega', 'color' => 'text-yellow-500'],
            'concluido' => ['text' => 'Concluído', 'color' => 'text-green-500'],
            'cancelado' => ['text' => 'Cancelado', 'color' => 'text-red-500'],
        ];

        return $statuses[$status] ?? ['text' => 'Desconhecido', 'color' => 'text-gray-500'];
    }
}
