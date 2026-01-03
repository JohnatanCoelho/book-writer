<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
   protected $table = 'autores';

   protected $fillable = [
    'nome',
    'nacionalidade',
    'bibliografia'
   ];

   public $timestamps = false;

   public function livros(){
        return $this->belongsToMany(Livro::class);
   }

}
