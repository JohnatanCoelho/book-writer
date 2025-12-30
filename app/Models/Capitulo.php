<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Livro;

class Capitulo extends Model
{
    protected $table = 'capitulos';

    protected $fillable = [
        'titulo',
        'personagens',
        'ideia_principal',
        'numero_paragrafos',
        'livro_id',
        'resumo_gerado'
    ];

    public $timestamps = false;

    public function livro(){
        return $this->belongsTo(Livro::class);
    }
}
