<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Capitulo;

class Livro extends Model{
    
    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'tipo'
    ];

    public $timestamps = false;

    public function capitulos(){
       return $this -> hasMany(Capitulo::class);
    }

    public function autores(){
        return $this->belongsToMany(Autor::class);
    }
}
