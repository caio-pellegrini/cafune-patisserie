<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'decimal:2', // Converte o campo 'price' para decimal com 2 casas decimais
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
