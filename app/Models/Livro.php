<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livro extends Model{
    
    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'tipo'
    ];
}
